<?php

namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\PostInterface;

//use Your Model

/**
 * Class PostRepository.
 */
class PostRepository implements PostInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getAllPosts() 
    {
        return Post::get();
    }

    public function getPostById($id) 
    {
        return Post::find($id);
        
    }

    public function createPost(array $request) 
    {
       return Post::create($request);


    }
}
