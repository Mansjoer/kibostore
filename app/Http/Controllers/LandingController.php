<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $datagame = Game::all();
        return view ('landing.index', compact('datagame'));
    }

    public function subscribe(Request $request)
    {
        Subscriber::create([
            'email' => $request->email
        ]);
        return redirect('/thankyou');
    }

    public function thankyou()
    {
        return view ('landing.thankyou')->withHeaders(['refresh' => '3;url=https://kibostore.id/']);
    }
}
