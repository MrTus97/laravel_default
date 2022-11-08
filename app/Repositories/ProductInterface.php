<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface ProductInterface 
{
    public function getAllProducts();
    public function getProductById($id);
    public function createProduct(Request $request);
    public function updateProduct(Request $request,$id);
    public function deleteProduct($id);


}
