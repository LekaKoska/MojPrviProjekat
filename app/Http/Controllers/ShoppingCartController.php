<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(ShoppingCartRequest $request)
    {
       Session::push("products",
           [                                              //        PRODUCTS     =  Kikiriki => 100 komada
               $request->id => $request->amount          // $_SESSION['products'] = [1 => 100]
           ]);

       return redirect("/cart");
    }

    public function showCart()
    {
        return view("cart",
            [
                "cart" => Session::get("products")
            ]);
    }
}
