<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use Illuminate\Http\Request;

class ChangeLogController extends Controller
{
    public function index(Request $request)
    {
        $changelogs = ChangeLog::orderBy('created_at','desc')?->get();

        $currentver = ChangeLog::all()->last()?->version;


        return view('admin.changelog.index', compact(['changelogs', 'currentver']));
    }

    public function create(Request $request)
    {
        Changelog::create($request->all());
        
        notify("Changelog added successfully!", "", "success");
        return redirect()->route('changelog');
    }
}
