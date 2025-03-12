<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use App\Models\OrdersItem;
use App\Models\OrdersModel;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $cart = Session::get("products");

        if(count($cart) < 1)
        {
            return redirect("/");
        }

        $allProducts = [];                  // Pravimo praznu varijablu kako bi tu dodavali id-jeve proizvoda

        foreach ($cart as $cartItem)
        {
            $allProducts[] = $cartItem['product_id'];               //  Pravimo petlju da predje preko cele sesije i da u varijablu $allProducts doda id ako ga nadje
        }
        $product = ShopModel::whereIn("id", $allProducts)->get();       // Sada nam $allPorducts izgleda ovako = [3,4,8], whereIn sluzi kako bi pronasli sve id-jeve u $allProducts.

        $combined = [];

        foreach (Session::get("products") as $item)
        {
            $productId = ShopModel::firstWhere("id", $item['product_id'])->first(); // Pronadji mi proizvod koji ima taj ID
            if($productId)
            {
                $combined[] =
                    [
                        'name' => $productId->name,
                        'amount' => $item['amount'],
                        'price' => $productId->price,
                        'total' => $item['amount']*$productId->price
                    ];
            }
        }


        return view("cart",
            [
                "cart" => Session::get("products"),
                "product" => $product,
                "combined" => $combined

            ]);
    }



    public function pay()
    {
        $user = Auth::check();

        if ($user !== true)
        {
            return redirect()->back()->with("error", "Must be logged user!");
        }

        $cart = Session::get("products");
        $totalCartPrice = 0;  // Cena za korpu



        foreach ($cart as $item)         // Predji preko sesije
        {
            $product = ShopModel::firstWhere(["id" => $item['product_id']])->first(); // Pronadji mi proizvod koji ima taj ID
            $totalCartPrice += $item['amount'] * $product->amount; // Nadodaj mi u $totalCartPrice cenu proizvoda

        }

        $order = OrdersModel::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($cart as $item)         // Predji preko sesije
        {
            $product = ShopModel::firstWhere(["id" => $item['product_id']])->first();  // Pronadji mi proizvod koji ima taj ID
            $product->amount -= $item['amount'];
            $product->save();

            OrdersItem::create(
                [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'amount' => $item['amount'],
                    'price' => $item['amount'] * $product->price
                ]);

        }

        Session::remove("products");

        return view("thankYou");

    }

}
