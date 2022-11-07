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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $post = Post::find(1);
        // $post -> user;
        // return response([
        //     'data'=> $post,

        // ]);

        // $index = Post::where('title','like', '%nguoi%')->get();
    

        // $posts = DB::table('posts')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->get();    
        // count : chỉ số lượng có thể thêm các thuộc tính

        $posts = Post::get();
        
        return response()->json($posts);
       
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $post = User::find(Auth::user()->id)->posts;
        // dd(Auth::user()-> id);
        $post = Post::create([
            'title'=> $request -> title, 
            'content'=> $request -> content,
            'user_id'=> Auth::user()-> id
        ]);

        
        return response()->json(
            // $post,           
            $post
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = User::find(Auth::user()->id);    
        $data = Post::find($id);
        $data->user;
        return response([
            'data'=> $data,

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
