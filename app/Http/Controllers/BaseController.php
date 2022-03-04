<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
  {
    //its just a dummy data object.
    $notification_changelog = ChangeLog::orderBy('created_at','desc')?->paginate(5);

    // Sharing is caring
    View::share('notification_changelog', $notification_changelog);
  }
}
