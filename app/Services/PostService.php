<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\PostInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Repositories\UserRepository;

class PostService   
{
    public PostInterface $PostRepository;

    public function __construct(PostInterface $PostRepository) 
    {

        $this->PostRepository = $PostRepository;
    }





    public function index()
    {
 
        return response()->json([
            'data' => $this-> PostRepository->getAllPosts()
        ]);
        
    }

    
    public function createPost(Request $request)
    {
        
        $data =[
            'title'=> $request -> title, 
            'content'=> $request -> content, 
            'user_id'=> Auth::user()-> id,
        ];
        
        return response()->json(['data' => $this-> PostRepository->createPost($data)]);
    }

    public function getPostById($id)
    {
        $data = $this-> PostRepository->getPostById($id);
        $data  -> user;
        return $data;
        
    }


}