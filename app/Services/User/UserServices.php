<?php
namespace App\Services\User;

use App\Repositories\User\UserReposityInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class UserServices {
    private $userReposiory;
    public function __construct(UserReposityInterface $userReposiory)
    {
        $this->userReposiory = $userReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->userReposiory->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->userReposiory->getDataId($id); 
        if(!$getOneData){
            $returnData = [
                'error' => 'Dữ liệu không tồn tại'
             ];
        }else{
            $returnData = [
                'message' => 'Lấy dữ liệu với id = '. $id,
                'data' => $getOneData
             ];
           
        }
        return $returnData;
        
    }
    public function storeData(Request $request)
    {
        $menu = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        
        $storeData = $this->userReposiory->createData($menu);
        $storeData->getInfoUser()->create([
            'avatar' => $request->avatar,
            'phone' => $request->phone
        ]);
        if(!$storeData){
            $returnData = [
                'message' => 'Error insert data table role'
             ];
        }else{
            $storeData->getInfoUser;
            $returnData = [
                'message' => 'Insert data table role success',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(Request $request , $id)
    {
        $datacheck = $this->userReposiory->getDataId($id);
      
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission
        ];
        if(!$datacheck){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            if(($request->permission) == 0){
                $datacheck->setRole()->sync([1,2,3,4]);
            }else if(($request->permission) == 1){
                $datacheck->setRole()->sync([1]);
            }
            $datacheck->getInfoUser;
            $this->userReposiory->updateData($data,$id);
           
            // $data->getUser;
            $returnData = [
                'message' => 'Updata thành công',
             ];
        }
        return $returnData;
    }
    public function loginUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $users = $this->userReposiory->getEmail($email);
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
        $data = $this->userReposiory->getUser();
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