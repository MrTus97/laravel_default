<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\User\UserServices;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    private $user;
    public function __construct(UserServices $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {     
        return $this->user->storeData($request);
                 
    }

    public function login(Request $request)
    {
        return $this->user->loginUser($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return $this->user->getUser();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
        return $this->user->updateData($request ,$id );    
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
    // public function getuser(){
    // //  $data = comment::where('created_at' )->get();
      
    // // $data = DB::table('users')->crossJoin('comments')
    // // ->get();
    //     $data = DB::table('comments')->groupBy('name');
    // //   ->join('users', function ($join) {
    // //       $join->on('users.id', '=', 'comments.user_id')
    // //         //    ->where('users.id','=','comments.user_id')
              
    // //         //    ->limit(1)
    // //         // ->groupBy('user_id')
    // //         ;
    // //   })
    // //   ->orderBy('comments.created_at', 'desc')
    // //   ->max('comments.created_at');
    // // ->distinct()
    // // ->where('users.id','=','comments.user_id')
    // //   ->get();
      

    //     return response($data);
    // }
}
