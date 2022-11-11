<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders() 
    {
        return Order::get();    
    }

    public function getOrderById($id) 
    {
        $orderId = Order::find($id);
        return $orderId;
    }

    public function createOrder(array $request) 
    {
        $data = Order::create(
            $request
        );

        return $data;

    }

}
