<?php
namespace App\Repositories;

use App\Models\ShopModel;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ShopModel();

    }

    public function getProductId($id)
    {
       return $this->productModel->where(['id' => $id])->first();
    }

    public function editProduct($singleProduct, $request)
    {
        $singleProduct->name = $request->get("name");
        $singleProduct->description = $request->get("description");
        $singleProduct->amount = $request->get("amount");
        $singleProduct->price = $request->get("price");
        $singleProduct->image = $request->get("image");
        $singleProduct->save();

    }

    public function addProduct($request)
    {
        return $this->productModel->create(["name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")]);
    }

}
