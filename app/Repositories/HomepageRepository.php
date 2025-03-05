<?php
namespace App\Repositories;

use App\Models\ShopModel;

class HomepageRepository
{
    private $homepageModel;

    public function __construct()
    {
        $this->homepageModel = new ShopModel();
    }

    public function orderByProductsSelect()
    {
        return $this->homepageModel->orderbyDesc('price')
            ->take(6)
            ->get();

    }
}
