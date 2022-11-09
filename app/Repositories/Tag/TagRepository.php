<?php
namespace App\Repositories\Tag;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Tag\TagReposityInterface;
use Illuminate\Support\Arr;

class TagRepository implements TagReposityInterface
{


    public function getAll()
    {
        
        return DB::table('tags')->get();;
    }


    public function getDataId($dataId)
    {
        return tag::find($dataId);
    }


    public function createData(array $data)
    {
        return tag::create($data);
    }


    public function updateData(array $data ,$id)
    {
        return tag::where('id',$id)->update($data);
       
    }
    public function deleteData($dataId)
    {
        return tag::destroy($dataId);
    }
}
