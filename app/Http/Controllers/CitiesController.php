<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function add(Request $request)
    {
            $request->validate([
                "name" => "string|unique:cities",
            ]);
    }
}
