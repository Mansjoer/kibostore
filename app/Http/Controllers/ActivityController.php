<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function logs(Request $request)
    {

        $logs = Activity::inRandomOrder()->get();

        return view('admin.activity.logs', compact(['logs']));
    }
}
