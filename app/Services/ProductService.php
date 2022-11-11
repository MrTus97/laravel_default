<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProductInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\Product;
use App\Repositories\UserRepository;

class ProductService   
{
    public ProductInterface $ProductRepository;

    public function __construct(ProductInterface $ProductRepository) 
    {
        $this->ProductRepository = $ProductRepository;
    }





    public function index()
    {
 
        return response()->json([
            'data' => $this-> ProductRepository->getAllProducts()
        ]);
        
    }

    
    public function createProduct(Request $request)
    {
        $data =[
            'name'=> $request -> name, 
            'content'=>$request->content,
            'menu_id'=>$request->menu_id,
            'user_id'=> Auth::user()-> id,
        ];
        
        return response()->json(['data' => $this-> ProductRepository->createProduct($data)]);
    }

    public function getProductById($id)
    {
        $data = $this-> ProductRepository->getProductById($id);
        $data ->orders;
        $data ->comments;
        $data ->user;
        return $data;
        
    }

    public function updateProduct(Request $request, $id) 
    {

        $productUpdate=([
            'name'=>$request->name,
            'content'=>$request->content,
            'menu_id'=> $request->menu_id,
            'user_id' => Auth::user()->id            
        ]);

        return response()->json([
            'info'=>$productUpdate,
            'data' => $this-> ProductRepository->updateProduct($productUpdate, $id)]);
    }
    public function deleteProduct($id) 
    {
        $productDelete = Product::find($id);
        $productDelete->delete();
        return $productDelete;
    }
}