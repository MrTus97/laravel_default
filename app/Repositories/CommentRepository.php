<?php

namespace App\Repositories;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\CommentInterface;

//use Your Model

/**
 * Class CommentRepository.
 */
class CommentRepository implements CommentInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getAllComments() 
    {
        

        return Comment::get();
    }

    public function getOrderById($id) 
    {
        $data = Comment::find($id);
        $data ->user;
        return $data;
    }

    public function createComment(Request $request) 
    {
        $post = Comment::create([
            'content'=> $request -> content,
            'product_id'=> $request->product_id,
            'user_id'=> Auth::user()-> id,
            // 'user_id'=> $request->user_id

        ]);
        return $post;

    }
}
