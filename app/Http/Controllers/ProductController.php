<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Menu;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\ProductInterface;

use Illuminate\Database\Eloquent\Builder;
use DB;


class ProductController extends Controller
{
    // public function __construct(Product $product){
    //     $this->product = $product;
    // }

    public ProductInterface $ProductRepository;

    public function __construct(ProductInterface $ProductRepository) 
    {
        $this->ProductRepository = $ProductRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        // $index = Product::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', '%cay%');
        // })->get();
        return response()->json([
            'data' => $this-> ProductRepository->getAllProducts()
        ]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        return response()->json([
            'data' => $this ->ProductRepository->createProduct($request),
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
        
        return response()->json(['data' => $this-> ProductRepository->getProductById($id)]);


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
        
        return response()->json(['data' => $this-> ProductRepository->updateProduct($request,$id)]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        return response([
            'data'=> $this ->ProductRepository ->deleteProduct($id),
            'message' => 'đã xóa product'
        ]);

    }
}
