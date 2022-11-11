<?php

namespace App\Repositories\Order;
use Illuminate\Http\Request;

interface OrderRepositoryInterface 
{
    public function getAllOrders();
    public function getOrderById($id);
    public function createOrder(array $request);
}
