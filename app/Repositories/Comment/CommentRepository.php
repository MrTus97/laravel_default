<?php
namespace App\Repositories\Comment;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\Comment\CommentReposityInterface;

class CommentRepository implements CommentReposityInterface
{
    public function getAll()
    {
        $data = DB::table('comments')->get();
        $returnData = [
            'message' => 'get all data',
            'data' => $data
        ];
        return $returnData;
    }
    public function getDataId($dataId)
    {
        $dataId = comment::find($dataId);
        $dataId->getUser;
        $dataId->getNew;
        $returnData = [
            'message' => 'get data follew id',
            'data' => $dataId
        ];
        return $returnData;
    }
    public function createData(Request $request)
    {
        $datacreate = comment::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'new_id' => $request->new_id
        ]);
        if(!$datacreate){
            return response([
                'error' => ' Error insert data table role',
            ]);
        }
        $returnData = [
            'message' => "Insert data to table comment success",
            'data' => $datacreate
        ];
        return $returnData;
    }
    public function updateData($dataId , Request $request)
    {
        $showId = comment::find($dataId);
        $datacreate = $showId->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'new_id' => $request->new_id
        ]);
        if(!$datacreate){
            return response([
                'error' => ' Error update data table role',
            ]);
        }
        $returnData = [
            'message' => "Update data table comment success",
            'data' => $datacreate
        ];
        return $returnData;
    }
    public function deleteData($dataId)
    {
        $delete = comment::destroy($dataId);
        $returnData = [
            'message' => "Delete data table comment success",
            'data' => $delete
        ];
        return $returnData;
    }
}
