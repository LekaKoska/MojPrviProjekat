<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
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
       $singleProduct = $this->productRepo->getProductId($products);
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

      $this->productRepo->editProduct($singleProduct, $request);

        return redirect("/shop");
    }




}
