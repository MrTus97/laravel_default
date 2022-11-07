<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllOrders() 
    {
        return Order::all();
    }


}