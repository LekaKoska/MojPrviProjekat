<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(WeatherModel $city)
    {
        for($i = 0; $i = 5; $i ++)
        {

        }

        return view("weather", compact("prognoza"));
    }
}
