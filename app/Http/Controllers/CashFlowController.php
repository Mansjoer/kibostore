<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;
use Illuminate\Support\Facades\Auth;

class CashFlowController extends Controller
{
    public function index()
    {
        $databook = CashFlow::orderBy('created_at', 'DESC')->paginate(8);
        return view ('admin.cashflows.index', compact(['databook']));
    }
    
    public function create(Request $request)
    {
        $newdata = CashFlow::create([
            'user_id' => Auth::user()->id,
            'description' => $request->description,
            'type' => $request->type,
            'amount' => $request->amount,
            ]);
        $newdata->save();
        notify("Data added successfully!", "", "success");
        return redirect()->route('accounting');
    }
}
