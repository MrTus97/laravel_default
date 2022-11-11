<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface PostInterface 
{
    public function getAllPosts();
    public function getPostById($id);
    public function createPost(array $request);



}
