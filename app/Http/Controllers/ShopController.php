<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
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
    public function getAllProducts()
    {
        $allProducts = ShopModel::all(); // SELECT * FROM products
        return view("shop", compact('allProducts'));
    }
    public function index()
    {
        return view("addProduct");
    }
    public function addProduct(Request $request)
    {
        $request->validate([
           "name" => "required|string",
           "description" => "required|string|min:6",
           "amount" => "required|integer",
           "price" => "required|integer",
           "image" => "required|string"
        ]);
        ShopModel::create([
           "name" => $request->get("name"),
           "description" => $request->get("description"),
           "amount" => $request->get("amount"),
           "price" => $request->get("price"),
           "image" => $request->get("image")
        ]);
        return redirect("/admin/products");
    }

    public function viewProducts()
    {
        $allProducts = ShopModel::all();

        return view("adminProduct", compact("allProducts"));
    }

}
