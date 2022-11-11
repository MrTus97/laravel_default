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
        return Product::find($id);


    }

    public function deleteProduct($id) 
    {
        $productDelete = Product::find($id);
        $productDelete->delete();
        return $productDelete;
    }

    public function createProduct(array $request) 
    {  
        return Product::create($request);
    }

    public function updateProduct(array $request, $id) 
    {
        // $productUpdate = Product::find($id);
        // $productUpdate ->update ([
        //     'name'=>$request->name,
        //     'content'=>$request->content,
        //     'menu_id'=> $request->menu_id,
        //     'user_id' => Auth::user()->id             
        // ]);   

        // return $productUpdate;
        return Product::find($id)->update([
            $request
        ]);
    }

}
