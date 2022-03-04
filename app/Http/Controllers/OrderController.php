<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use App\Models\Product;
use App\Models\CashFlow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Svakode\Svaflazz\Svaflazz;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class OrderController extends Controller
{
    public function orderIndex(Request $request)
    {
        

        if($request->has('find')){
            $datagame = Game::where('name', 'LIKE', '%'.$request->find.'%')->orWhere('display_name', 'LIKE', '%'.$request->find.'%')->paginate(8);
        }else{
            $datagame = Game::select('*')
            ->where('status', '1')
            ->orderBy('status', 'DESC')
            ->paginate(8);
        };

        // $datagame = Game::orderBy('status', 'desc')->get();

        return view ('admin.orders.index', compact(['datagame']));
    }
    
    public function orderHistory()
    {
        $orderList = Order::where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate(8);

        return view ('admin.orders.history', compact(['orderList']));
    }

    public function productsOrder(Request $request, $slug)
    {
        $dataproducts = Game::where('slug', $slug)->first();

        $datagames = Game::select('*')
            ->where([
                ['slug', '!=', $slug],
                ['status', 1],
            ])
            ->orderBy('status', 'DESC')
            ->paginate(6);
        
        return view ('admin.orders.products', compact(['dataproducts', 'datagames']));
    }

    public function processOrder(Request $request)
    {

        $user_id = Auth::user()->id;

        $number = mt_rand(1000000000, 9999999999);

        $pricecode = mt_rand(1, 300);

        $products_price = Product::where('product_sku', $request->product_sku)->first();

        $new = Order::create([
            'invoice_id' => $number,
            'customer_no' => $request->customer_no,
            'product_sku' => $request->product_sku,
            'slug' => 'INV'.'-'.$number,
            'user_id' => $user_id,
            'status' => 'Waiting',
            'price' => $products_price->price + $pricecode,
            'profit' => $products_price->price + $pricecode - $products_price->seller_price,
        ]);

        $products_id = Product::where('product_sku', $request->product_sku)->first();

        $new->products()->attach($products_id);
        $new->save();
        
        notify("Order placed successfully!", "", "success");
        return redirect('/admin/invoice/'.$new->slug);
    }

    public function invoiceOrder($slug)
    {
        $invoiceSlug = Order::where('slug', $slug)->first();
        $invoiceStatus = Order::with([ 'user', 'products', 'products.games' ])->where('slug', $slug)->first();
        $invoiceData = Order::with([ 'user', 'products', 'products.games' ])->where('slug', $slug)->first();

        if($invoiceSlug->status == 'Pending'){
            $buyer_sku_code = $invoiceStatus->product_sku;
            $customer_no = $invoiceStatus->customer_no;
            $ref_id = $invoiceStatus->invoice_id;
            
            $digiflazz = Svaflazz::topup($buyer_sku_code, $customer_no, $ref_id);

            $digistatus = $digiflazz->data->status;

        $invoiceStatus->update([
            'status' => $digiflazz->data->status,
            
        ]);
        }

        return view ('admin.invoices.index', compact(['invoiceSlug', 'invoiceData', 'invoiceStatus']));
    }

    public function invoiceProceed($slug)
    {
        $invoiceSlug = Order::where('slug', $slug)->first();
        
        $products_price = Product::where('product_sku', $invoiceSlug->product_sku)->first();
        
        $invoiceSlug->update([
            'status' => 'Pending',
        ]);
        
        CashFlow::create([
            'user_id' => Auth::user()->id,
            'description' => 'New order expenses',
            'type' => 'Expenses',
            'amount' => $products_price->seller_price,
            ]);
            
        CashFlow::create([
            'user_id' => Auth::user()->id,
            'description' => 'New order profit',
            'type' => 'Income',
            'amount' => $products_price->profit,
            ]);

        notify("Order confirmed!", "", "success");
        return redirect('/admin/order/history');
    }
    
    public function invoiceCancel($slug)
    {
        $invoiceData = Order::where('slug', $slug)->first();
        
        $invoiceData->update([
            'status' => 'Gagal',
            'profit' => '0',
        ]);

        notify("Order canceled!", "", "error");
        return redirect('/admin/order/history');
    }
}
