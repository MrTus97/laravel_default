<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

use App\Repositories\Order\OrderRepository;

use Illuminate\Http\JsonResponse;
use App\Models\Menu;
use DB;
class OrderController extends Controller
{
    

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }
    public function index()
    {

         
        return response()->json([
            'data' => $this->orderRepository->getAllOrders()
        ]);
    }

    public function store(Request $request)
    {
        return response([
            'data' => $this->orderRepository->createOrder($request),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'data' => $this->orderRepository->getOrderById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
