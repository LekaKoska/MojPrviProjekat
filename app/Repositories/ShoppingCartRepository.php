<?php

namespace App\Repositories;

use App\Http\Requests\ShoppingCartRequest;
use App\Models\ShopModel;

class ShoppingCartRepository
{
    private $shoppingCart;
    private $orderRepo;
    public function __construct()
    {
        $this->shoppingCart = new ShopModel();

    }


    public function productId($request)
    {
        return ShopModel::where(['id' => $request->id])->first();
    }

    public function firstWhereIdProduct($item)
    {
        return ShopModel::firstWhere("id", $item['product_id'])->first();
    }
}
