<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $products = [
            "iPhone 12", "Samsung A52", "Samsung S24", "iPhone 13 pro max"
        ];
        return view("shop", compact('products'));
    }
}
