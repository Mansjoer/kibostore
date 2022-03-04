<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Balance;
use App\Models\CashFlow;
use Illuminate\Http\Request;
use Svakode\Svaflazz\Svaflazz;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // Get Users Balance
        $users = Auth::user()->id;
        $usersbalance = Balance::with('users')->where('user_id', $users)->first();

        $countusers = User::count();
        
        $expenses = Order::where('status', 'Sukses')->sum('price');

        $checkBalance = (array) Svaflazz::checkBalance();
        
        $income = CashFlow::where('type', 'Income')->sum('amount');
        $outcome = CashFlow::where('type', 'Expenses')->sum('amount');
        $ordersuccess = Order::where('status', 'Sukses')->count();
        
        $profit = $income - $outcome;

        $last_seen = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);

        return view ('admin.dashboard', compact(['countusers', 'last_seen', 'usersbalance', 'checkBalance', 'expenses', 'income', 'outcome', 'profit', 'ordersuccess']));

    }
}
