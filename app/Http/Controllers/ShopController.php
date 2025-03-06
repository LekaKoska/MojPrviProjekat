<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
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
        $allProducts = ShopModel::all();

        return view("shop", compact('allProducts'));
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
    public function addProduct(AddProductRequest $request)
    {

        $this->productRepo->addProduct($request);
        return redirect("/product/shop");
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

        return redirect("/product/shop");
    }

    public function permalink(ShopModel $product)
    {
        return view("permalink", compact("product"));
    }




}
