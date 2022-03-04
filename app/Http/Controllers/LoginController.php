<?php

namespace App\Http\Controllers;

use App\Gamify\Points\FirstLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $input = $request->all();

        $remember_me = $request->has('remember')? true:false; 

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']), $remember_me))
        {
            return redirect()->route('dashboard');
        }else{
            notify("Game added successfully!", "", "success");
            return redirect()->route('login');
        }

        //if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect()->route('dashboard');
        // }
        // return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
