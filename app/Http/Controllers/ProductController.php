<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Menu;
use App\Models\Product;

use DB;


class ProductController extends Controller
{
    public function __construct(Product $product){
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Product::get();
        return response()->json($index);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Product::create([
            'name'=> $request -> name, 
            'content'=> $request -> content, 
            'user_id'=> Auth::user()-> id,
            'menu_id'=> $request ->menu_id,

        ]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idProduct = $this -> product->find($id);
        return response([
            'data' => $idProduct
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
        
        $productUpdate = $this -> product->find($id);
        $productUpdate ->update ([
            'name'=>$request->name,
            'content'=>$request->content,
            'menu_id'=> $request->menu_id,
            'user_id' => Auth::user()->id             
        ]);   
        return response([
            'data' => $productUpdate,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = $this -> product->find($id);
        $productDelete->delete();
        return response([
            'message' => 'đã xóa product'
        ]);

    }
}
