<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class userApiController extends Controller
{
    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }

    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            DB::connection()->enableQueryLog();
                $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $data->getInfoUser()->create([
                'avatar' => $request->avatar,
                'phone' => $request->phone
            ]);
            $data->getInfoUser;
            $queries = DB::getQueryLog();
            DB::commit();
            return response([
                'message' => 'Đăng Ký Thành Công',
                'data' => [
                    $data
                ]


            ]);
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return response([
                'error' => 'Đăng Ký Không Thành Công',
            ]);
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $users = User::where('email', $email)->first();
            $token = JWTAuth::fromUser($users);
            $users->getInfoUser;
            return response()->json([
                'token' => $token,
                'user' => $users
            ]);
        }else{
            return response([
                'error' => 'Đăng nhập không thành công'
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::find(Auth::user()->id);
        $data->getInfoUser;
        $data->getRole;
        $data->getMenu;
        $data->getNew;

        return response([
            'user' => $data,
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

        try {
            DB::beginTransaction();
            // DB::connection()->enableQueryLog();
            $getUser = User::find($id);
                $data = $getUser->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'permission' => $request->permission

            ]);

            if(($request->permission) == 0){
                $getUser->setRole()->sync([1,2,3,4]);

            }else if(($request->permission) == 1){
                $getUser->setRole()->sync([1]);
            }

            $getUser->getInfoUser;
            // $queries = DB::getQueryLog();
            DB::commit();
            return response([
                'message' => 'Update Thành Công',
                'data' => [
                    $getUser
                ]


            ]);
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return response([
                'error' => 'Update Không Thành Công',
            ]);
        }
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
