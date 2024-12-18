<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function welcome()
    {
        $time = date("H");
        $timeMinutesSec = date("h:i:s");
        return view("welcome", compact('time', 'timeMinutesSec'));
    }
}

