<?php
namespace App\Repositories\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\User\UserReposityInterface; 

class UserRepository implements UserReposityInterface
{
    public function getAll()
    {
        return User::get();
    }
    public function getDataId($dataId)
    {
       

    }
    public function createData(Request $request)
    {
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
        $returnData = ([
            'message' => 'Đăng Ký Thành Công',
            'User' => $data
        ]);
        return $returnData;
        
    }
    public function updateData($dataId , Request $request)
    {
            $getUser = User::find($dataId);

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

        $returnData = [
            'message' => 'Update Thành Công',
            'data' => $getUser
        ];
        return $returnData;
    
    }
    
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $users = User::where('email', $email)->first();
            $token = JWTAuth::fromUser($users);
            $users->getInfoUser;
            $returnData = ([
                'message' => "Login success",
                'Token' => $token,
                'User' => $users
            ]);
            return $returnData;
        }else{
            return response([
                'error' => 'Đăng nhập không thành công'
            ]);
        }
    }
    public function getUser()
    {
        $data = User::find(Auth::user()->id);
        $data->getInfoUser;
        $data->getRole;
        $data->getMenu;
        $data->getNew;
        $returnData = [
            'user' => $data,
        ];
        return $returnData;
    }
}