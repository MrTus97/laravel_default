<?php

namespace App\Repositories;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Validator;  

//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository implements UserInterface
{ 
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    // public function viewUser() 
    // {
       
    //     $data = User::find(Auth::user()->id);
    //     $data ->address;
    //     $data ->post;
    //     $data ->order;
    //     $data ->comments;
    //     return $data;

    // }


    //LẤY COMMENT CUỐI CÙNG CỦA TẤT CẢ USER
    public function viewUser() 
    {
        $data = User::join('comments', 'users.id', '=', 'comments.user_id')->get();
        return $data;


    }

    //lấy comment theo user_id nhập vào params
    public function userId(Request $request) 
    {
        $id = $request->user_id;
        $data = Comment::where("user_id",$id)->get();

        return  $data;


    }
    

    
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|',
            'password' => 'required|string|min:6',
        ]);

        //To JSON – Để convert một model sang JSON
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)],
            
        ));

        $user -> address() ->create([
            'street'=> $request -> street, 
            'state'=> $request -> state, 
            'city'=> $request -> city, 

        ]);
        $user->address;

        return $user;
    }

    public function login(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            // 'number'=>'required|integer',
            'password' => 'required|string|min:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'kh tìm thấy tài khoản']);
        }
        return $this->createNewToken($token);
    }
    public function createNewToken($token){
        return response()->json([
            'message' => 'login thành công',
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()                 
        ]);
    }

}
