<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(ShoppingCartRequest $request)
    {
        $product = ShopModel::where(['id' => $request->id])->first();

        if($product->amount  < $request->amount)
        {
            return redirect()->back()->with("error", 'Too many items');
        }

        Session::push("products",
            [
                "product_id" => $request->id,
                "amount" => $request->amount
            ]);




       return redirect("/cart");
    }

    public function showCart()
    {

        $allProducts = [];                  // Pravimo praznu varijablu kako bi tu dodavali id-jeve proizvoda

        foreach (Session::get("products") as $cartItem)
        {
            $allProducts[] = $cartItem['product_id'];               //  Pravimo petlju da predje preko cele sesije i da u varijablu $allProducts doda id ako ga nadje
        }
        $product = ShopModel::whereIn("id", $allProducts)->get();       // Sada nam $allPorducts izgleda ovako = [3,4,8], whereIn sluzi kako bi pronasli sve id-jeve u $allProducts.



        return view("cart",
            [
                "cart" => Session::get("products"),
                "product" => $product
            ]);
    }

    public function delete()
    {
        Session::forget("products");

        return redirect()->back();
    }


}
