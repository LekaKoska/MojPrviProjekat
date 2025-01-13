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
           "name" => "required|string|unique:products",
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
        return redirect("/shop");
    }

    public function viewProducts()
    {
        $allProducts = ShopModel::all();

        return view("adminProduct", compact("allProducts"));
    }

    public function delete($products)
    {
       $singleProduct = ShopModel::where(['id' => $products])->first();
       if($singleProduct === null)
       {
           die("This product doesn't exist!");
       }
       $singleProduct->delete();
       return redirect()->back();
    }

    public function update(Request $request, ShopModel $product)
    {

        return view("editProduct", compact("product"));

    }
    public function edit(Request $request, ShopModel $singleProduct)
    {

        $singleProduct->name = $request->get("name");
        $singleProduct->description = $request->get("description");
        $singleProduct->amount = $request->get("amount");
        $singleProduct->price = $request->get("price");
        $singleProduct->image = $request->get("image");
        $singleProduct->save();

        return redirect("/shop");
    }




}
