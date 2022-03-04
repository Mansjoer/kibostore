<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkTreeController extends Controller
{
    public function index()
    {
        $auth = Auth::check();
        
        return view('linktree.index', compact(['auth']));
    }
}
