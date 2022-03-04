<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\CashFlow;
use Illuminate\Http\Request;
use Svakode\Svaflazz\Svaflazz;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        
        return view('admin.deposit.index');
    }

    public function new(Request $request)
    {
        
        // Post to digiflazz
        $amount = $request->amount;
        $bank = $request->bank;
        $owner_name = $request->owner_name;

        $digiflazz = Svaflazz::deposit($amount, $bank, $owner_name);

        // Post to deposit database
        $deposit = new Deposit();
        $deposit->amount = $digiflazz->data->amount;
        $deposit->bank = $request->bank;
        $deposit->owner_Name = $request->owner_name;
        $deposit->note = $digiflazz->data->notes;
        $deposit->status = '2';
        $deposit->user_id = Auth::user()->id;
        $deposit->save();
        
        // Post to cashflow database
        CashFlow::create([
            'user_id' => Auth::user()->id,
            'description' => 'New Deposit',
            'type' => 'Expenses',
            'amount' => $deposit->amount,
            ]);

        notify("Please transfer $request->amount!", "Success!", "success");
        return redirect()->route('history-deposit');
    }

    public function history()
    {
        $users = Auth::user()->id;

        $deposithistory = Deposit::with('user')->where('user_id', $users)->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.deposit.history', compact('deposithistory'));
    }
}
