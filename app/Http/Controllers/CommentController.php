<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CommentInterface;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    private $CommentRepository;

    public function __construct(CommentInterface $CommentRepository) 
    {
        $this->CommentRepository = $CommentRepository;
    }
    public function index()
    {

     
        return response()->json([
            'data' => $this->CommentRepository->getAllComments(),
        ]);
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
            'data'=> $this->CommentRepository->createComment($request),
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
            'data'=> $this->CommentRepository->getOrderById($id),

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