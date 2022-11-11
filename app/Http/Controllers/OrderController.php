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
use App\Services\OrderService;

use Illuminate\Http\JsonResponse;
use App\Models\Menu;
use DB;
class OrderController extends Controller
{
    

    private $orderService;

    public function __construct(OrderService $orderService) 
    {
        $this->orderService = $orderService;
    }
    public function index()
    { 
        return response()->json([
            'data' => $this->orderService->index()
        ]);
    }

    public function store(Request $request)
    {
        return response([
            'data' => $this->orderService->createOrder($request),
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
            'data' => $this->orderService->getOrderById($id)
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
