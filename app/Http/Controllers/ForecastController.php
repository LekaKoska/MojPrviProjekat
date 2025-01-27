<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index($city)
    {


        $forecast = [
            "beograd" => [22, 21, 13, 19, 20],
            "sarajevo" => [10, 15, 18, 16],

        ];
        $city = strtolower($city);
       if(!array_key_exists($city, $forecast))
       {
           die("ovaj grad ne postoji");
       }



    }
}
