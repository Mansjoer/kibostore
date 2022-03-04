<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TicketController extends Controller
{
    public function index()
    {
    }

    public function help(Request $request)
    {

        return view('admin.tickets.help');
    }

    public function send(Request $request)
    {
    }
}
