<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface ProductInterface 
{
    public function getAllProducts();
    public function getProductById($id);
    public function createProduct(array $request);
    public function updateProduct(array $request,$id);
    public function deleteProduct($id);


}
