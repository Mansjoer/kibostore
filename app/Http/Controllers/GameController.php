<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class GameController extends Controller
{
    public function gamesIndex(Request $request)
    {
        
        if($request->has('find')){
            $datagame = Game::where('name', 'LIKE', '%'.$request->find.'%')->orWhere('display_name', 'LIKE', '%'.$request->find.'%')->paginate(4);
        }else{
            $datagame = Game::select('*')
            ->whereNotNull('status')
            ->orderBy('status', 'DESC')
            ->paginate(8);
        };

        // $datagame = Game::orderBy('status', 'desc')->get();

        return view ('admin.games.index', compact(['datagame']));
    }

    public function gamesNew(Request $request)
    {
        Game::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'slug' => Str::slug($request->display_name, '-'),
            'status' => $request->status,
            'image' => $request->image,
        ]);
        
        notify("Game added successfully!", "", "success");
        return redirect()->route('games');
    }

    public function gamesEdit($slug)
    {
        $games = Game::where('slug', $slug)->first();
        
        return view ('admin.games.edit', compact(['games']));
    }

    public function gamesUpdate(Request $request, $slug)
    {
        $user = Auth::user();
        $games = Game::where('slug', $slug)->first();
        $games->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'slug' => Str::slug($request->display_name, '-'),
            'status' => $request->status,
            'image' => $request->image,
        ]);

        
        notify("Game updated successfully!", "", "info");
        return redirect()->route('games');

        
        $activity = Activity::all()->last();
        $activity->properties->toArray();
        $activity->causer;
        $activity->subject; 
        $activity->description;
        $user->action;

    }

    public function gamesDel($slug)
    {
        $games = Game::where('slug', $slug)->first();
        $games->delete();
        
        notify("Game deleted successfully!", "", "error");
        return redirect()->route('games');
    }

    public function productsIndex(Request $request, $slug)
    {
        $dataproducts = Game::where('slug', $slug)->first();
        // $datagames = Game::all()->sortByDesc('profit');

        return view ('admin.products.index', compact(['dataproducts']));
    }

    public function productsNew(Request $request, $slug)
    {   
        $slugs = Game::where('slug', $slug)->pluck('id')->first();

        $new = Product::create([
            'product_sku' => $request->product_sku,
            'name' => $request->name,
            'seller_price' => $request->seller_price,
            'price' => $request->price,
            'slug' => $request->product_sku,
            'profit' => $request->price - $request->seller_price,
        ]);

        $new->games()->attach($slugs);
        $new->save();

        
        notify("Product added successfully!", "", "success");
        return redirect('admin/products/'.$slug);
    }

    public function productsEdit($slug)
    {
        $products = Product::where('slug', $slug)->first();
        
        return view ('admin.products.edit', compact(['products']));
    }

    public function productsUpdate(Request $request, $slug)
    {   
        $products = Product::where('slug', $slug)->first();
        $products->update([
            'product_sku' => $request->product_sku,
            'name' => $request->name,
            'seller_price' => $request->seller_price,
            'price' => $request->price,
            'slug' => Str::slug($request->product_sku, '-'),
            'profit' => $request->price - $request->seller_price,
        ]);

        $activity = Activity::all()->last();
        $activity->properties->toArray();
        $activity->causer;
        $activity->subject; 
        $activity->description;
        
        notify("Product updated successfully!", "", "info");
        return redirect()->route('games');
    }

    public function productsDel($slug)
    {
        
        $products = Product::where('slug', $slug)->first();
        $products->delete();
        
        $products->games()->detach($slug);
        notify("Product deleted successfully!", "", "error");
        return redirect()->route('games');
    }
}
