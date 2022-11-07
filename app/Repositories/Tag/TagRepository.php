<?php
namespace App\Repositories\Tag;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Tag\TagReposityInterface; 

class TagRepository implements TagReposityInterface
{


    public function getAll()
    {
        $data = DB::table('tags')->get();
        $returnData = [
            'message' => 'get all data table tags',
            'data' => $data
        ];
        return $returnData;
    }


    public function getDataId($dataId)
    {
        $dataId = tag::find($dataId);
        $dataId->getNew;
        
        $returnData = [
            'message' => 'get data follew id',
            'data' => $dataId
        ];
        return $returnData;
    }


    public function createData(Request $request)
    {
        $datacreate = tag::create([
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
        $data = tag::where('id',$dataId)->first();
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
        tag::destroy($dataId);
        $returnData = [
            'message' => 'Delete success'
        ];
        return $returnData;
    }
}
