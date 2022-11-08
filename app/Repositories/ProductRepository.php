<?php

namespace App\Repositories;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\ProductInterface;


//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository implements ProductInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getAllProducts() 
    {
        return Product::get();

    }

    public function getProductById($id) 
    {
        $data = $data = Product::find($id);
        $data ->orders;
        $data ->comments;
        $data ->user;

        return $data;

    }

    public function deleteProduct($id) 
    {
        $productDelete = Product::find($id);
        $productDelete->delete();
        return $productDelete;
    }

    public function createProduct(Request $request) 
    {
        $data = Product::create([
            'name'=> $request -> name, 
            'content'=> $request -> content, 
            'user_id'=> Auth::user()-> id,
            'menu_id'=> $request ->menu_id,

        ]);
        return $data;
    }

    public function updateProduct(Request $request, $id) 
    {
        $productUpdate = Product::find($id);
        $productUpdate ->update ([
            'name'=>$request->name,
            'content'=>$request->content,
            'menu_id'=> $request->menu_id,
            'user_id' => Auth::user()->id             
        ]);   

        return $productUpdate;
    }

}
