<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function welcome()
    {
        $products = ShopModel::orderbyDesc('price',)
                                  ->take(6)
                                  ->get();
        return view("welcome", compact('products'));
    }
}

