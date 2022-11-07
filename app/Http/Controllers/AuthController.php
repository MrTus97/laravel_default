<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use App\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{

    

    public function login(Request $request){
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
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        
        return response()->json([
            'message' => 'login thành công',
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()     
            
        ]);
    }

    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'logout thành công']);
    }
 

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
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
        return response()->json([
            'message' => 'đk thành công',
            'user' => $user,
        ], 201);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {     

            // / ->join('comments', 'users.id', '=', 'comments.user_id')->get();
        $data = User::find(Auth::user()->id);
        $data ->address;
        $data ->post;
        $data ->order;
        $data ->comments;
        return response([
            'data'=> $data,

        ]);
        
    }

    
}
