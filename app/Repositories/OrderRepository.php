<?php
namespace App\Repositories;

use App\Models\OrdersModel;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    private $order;

    public function __construct()
    {
        $this->order = new OrdersModel();
    }

    public function orderCreate($totalCartPrice)
    {
      return OrdersModel::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
            ]);

    }
}
