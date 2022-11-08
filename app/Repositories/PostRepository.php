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
        $data = Post::find($id);
        $data->user;
        return $data;
    }

    public function createPost(Request $request) 
    {
        $post = Post::create([
            'title'=> $request -> title, 
            'content'=> $request -> content,
            'user_id'=> Auth::user()-> id
        ]);
        return $post;

    }
}
