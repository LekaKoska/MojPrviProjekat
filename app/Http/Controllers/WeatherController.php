<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza =
            [
                'beograd' => 21,
                'sarajevo' => 23,
                'novi sad' => 16
            ];

        return view("weather", compact("prognoza"));
    }
}
