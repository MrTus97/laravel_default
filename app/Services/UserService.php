<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  

use App\Models\Menu;
use App\Models\User;
use App\Models\Address;



class UserService   
{
    public UserInterface $UserRepository;

    public function __construct(UserInterface $UserRepository) 
    {
        $this->UserRepository = $UserRepository;
    }





    public function viewUser()
    {
        $data= $this-> UserRepository->viewUser();
        // $data ->address;
        // $data ->post;
        // $data ->order;
        // $data ->comments;
        return $data;

        
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


    
    public function register(Request $request)
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

}