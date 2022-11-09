<?php
namespace App\Repositories\Role;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Role\RoleReposityInterface; 

class RoleRepository implements RoleReposityInterface
{


    public function getAll()
    {
       
        return DB::table('roles')->get();
    }


    public function getDataId($dataId)
    {
        return Role::find($dataId);
    }


    public function createData(array $data)
    {
        
        return Role::create($data);
    }


    public function updateData( array $data ,$dataId )
    {
        return Role::where('id',$dataId)->update($data);
       
    }
    public function deleteData($dataId)
    {

        return Role::destroy($dataId);
    }
}
