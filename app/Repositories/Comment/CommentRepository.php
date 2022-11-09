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
        return DB::table('comments')->get();
    }
    public function getDataId($dataId)
    {
        return comment::find($dataId);
    }
    public function createData(array $data)
    {
        
        return comment::create($data);
    }
    public function updateData(array $data ,$dataId)
    {
        
        return comment::where('id',$dataId)->update($data);
    }
    public function deleteData($dataId)
    {
        return comment::destroy($dataId);
    }
}
