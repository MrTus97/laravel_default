<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Hash;
use App\Repositories\PostRepository;
use App\Repositories\PostInterface;

class PostController extends Controller
{
   
    private $PostRepository;

    public function __construct(PostInterface $PostRepository) 
    {
        $this->PostRepository = $PostRepository;
    }
    public function index()
    {

        // $post = Post::find(1);
        // $post -> user;
        // return response([
        //     'data'=> $post,

        // ]);

        // $index = Post::where('title','like', '%nguoi%')->get();
        // count : chỉ số lượng có thể thêm các thuộc tính

        
        return response()->json(['data'=> $this->PostRepository->getAllPosts()]);
       
        

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
            'mess'=>'dữ liệu được thêm vào',
            'post'=> $this ->PostRepository->createPost($request),
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


        return response([
            'data'=> $this->PostRepository->getPostById($id),

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
