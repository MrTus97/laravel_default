<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Repositories\UserRepository;

class OrderService   
{
    public OrderRepositoryInterface $OrderRepository;

    public function __construct(OrderRepositoryInterface $OrderRepository) 
    {

        $this->OrderRepository = $OrderRepository;
    }





    public function index()
    {
        return response()->json([
            'data' => $this-> OrderRepository->getAllOrders()
        ]);
        
    }

    
    public function createOrder(Request $request)
    {

        // dd($request);
        $data =[
            'name'=> $request -> name, 
            'phone'=> $request -> phone, 
            'user_id'=> Auth::user()-> id,
        ];
        $ngu = $this-> OrderRepository->createOrder($data);
        $ngu -> products ()->attach([
            'product_id' => $request ->product_id
                
        ]);
        return response()->json(['data' => $ngu
   
        ]);
    }

    public function getOrderById($id)
    {
        $data = $this-> OrderRepository->getOrderById($id);
        $data->products;
        return $data;
        
    }


}