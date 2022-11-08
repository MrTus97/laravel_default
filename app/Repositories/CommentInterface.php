<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface CommentInterface 
{
    public function getAllComments();
    public function getOrderById($id);
    public function createComment(Request $request);
}
