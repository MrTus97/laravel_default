<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Repositories\UserRepository;
use App\Repositories\UserInterface;
use App\Models\Address;
use App\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;


class AuthController extends Controller
{

    

    private $userService;

    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }


    public function login(Request $request){
        return response([
            'data' => $this->userService->login($request),
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
            'user' => $this -> userService -> Register($request),
        ]);

    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {     
        return response([
            'data'=> $this-> userService -> viewUser(),

        ]);
    }

    public function getuserid(Request $request)
    {
        return response()->json([
            'Comment user_id' => $this->UserRepository->userId($request),
        ]);
    }

    // chưa hoàn thành !!
    public function getusercm() {             
        $data = User::join('comments','users.id','=','comments.user_id')
        ->get();
        return $data;
    }


    
}