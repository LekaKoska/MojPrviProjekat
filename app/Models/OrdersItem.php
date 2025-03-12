<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'amount', 'price'];


}
