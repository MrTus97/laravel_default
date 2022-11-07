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
        $data = DB::table('roles')->get();
        $returnData = [
            'message' => 'get all data table role',
            'data' => $data
        ];
        return $returnData;
    }


    public function getDataId($dataId)
    {
        $dataId =  Role::find($dataId);
      
        $returnData = [
            'message' => 'get data follew id',
            'data' => $dataId
        ];
        return $returnData;
    }


    public function createData(Request $request)
    {
        $datacreate = Role::create([
            'name' => $request->name
        ]);
        if(!$datacreate){
            return response([
                'error' => ' Error insert data table role',
            ]);
        }
        $returnData = [
            'message' => 'Insert data table role success',
            'data' => $datacreate
        ];
        return $returnData;
    }


    public function updateData($dataId , Request $request)
    {
        $data = Role::where('id',$dataId)->first();
         $dataUpdate = $data->update([
            'name' => $request->name
        ]);
        if(!$dataUpdate){
            return response([
                'error' => ' Error Update data table role',

            ]);
        }
        $returnData = [
            'message' => 'Update data table role success',
        ];
        return $returnData;
       
    }
    public function deleteData($dataId)
    {
        Role::destroy($dataId);
        $returnData = [
            'message' => 'Delete success'
        ];
        return $returnData;
    }
}
