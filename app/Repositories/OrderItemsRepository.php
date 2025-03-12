<?php
namespace App\Repositories;

use App\Models\OrdersItem;

class OrderItemsRepository
{
    private $orderItems;

    public function __construct()
    {
        $this->orderItems = new OrdersItem();
    }

    public function createOrderItems($order, $product, $item)
{
     return OrdersItem::create(
        [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'amount' => $item['amount'],
            'price' => $item['amount'] * $product->price
        ]);
}
}
