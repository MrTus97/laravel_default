<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\User;
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
    public function getuser(){
    
        $users = User::with(['getComment' => function ($query) {
            // $query->where('id', 'like', '%6%');
            $query->orderBy('id','desc')
                    ->limit(1);
         
        }])->get();
     

        return response($users);
    }
}
