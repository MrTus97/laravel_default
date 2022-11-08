<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders() 
    {
        return Order::all();    
    }

    public function getOrderById($id) 
    {
        $orderId = Order::find($id);
        $orderId->products;
        return $orderId;
    }

    public function createOrder(Request $request) 
    {
        $data = Order::create([
            'name'=> $request -> name, 
            'phone'=> $request -> phone, 
            'user_id'=> Auth::user()-> id,
        ]);
        $data->products ()->attach([
            'product_id' => $request ->product_id

        ]);
        return $data;

    }

}
