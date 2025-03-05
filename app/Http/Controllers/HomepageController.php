<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use App\Repositories\HomepageRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private $homepageRepo;
    public function __construct()
    {
        $this->homepageRepo = new HomepageRepository();
    }
    public function welcome()
    {
        $products = $this->homepageRepo->orderByProductsSelect();
        return view("welcome", compact('products'));
    }
}

