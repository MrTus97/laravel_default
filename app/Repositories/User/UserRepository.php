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
        return User::with('getInfoUser','getMenu','getNew','getRole')->get();
    }
    public function getDataId($dataId)
    {
       return User::find($dataId);

    }
    public function createData(array $data)
    {

        return User::create($data);
        
    }
    public function updateData(array $data,$dataId)
    {
           
        return User::where('id',$dataId)->update($data);
    
    }
    public function getEmail($email)
    {
        return User::where('email', $email)->first();
    }
    
    public function getUser()
    {
        return User::find(Auth::user()->id);
    }
}