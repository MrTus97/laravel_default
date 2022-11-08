<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

use App\Models\Address;
use App\Models\Post;
use App\Repositories\UserRepository;
use App\Repositories\UserInterface;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    private UserInterface $UserRepository;

    public function __construct(UserInterface $UserRepository) 
    {
        $this->UserRepository = $UserRepository;
    }
    

    public function login(Request $request){
        return response([
            'data' => $this->UserRepository->login($request),

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
        return response()->json([
            'message' => 'đk thành công',
            'user' => $this -> UserRepository -> Register($request),
        ]);

    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {     
        return response([
            'data'=> $this-> UserRepository -> viewUser(),

        ]);
        
    }

    public function getuserid(Request $request)
    {
        return response()->json([
            'Comment user_id' => $this->UserRepository->userId($request),
        ]);
    }
}
