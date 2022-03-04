<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungWR extends Controller
{
    public function index()
    {
        return view('admin.winrate.index');
    }
}
