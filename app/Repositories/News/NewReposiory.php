<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\NewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\News\NewReposityInterface; 

/**
 * Class NewReposiory.
 */
class NewReposiory implements NewReposityInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getAll()
    {

        return News::with('user','menu','getComment','tag')->get();
        
    }
    public function getNewId($newId)
    {

        return News::where('id',$newId)->first();
    }
    public function createNew(array $data)
    {
        
            return News::create($data);
    }
    public function updateNew(array $data, $newId)
    {
        
        return News::where('id',$newId)->update($data);
       
    }
    public function deleteNew($newId)
    {

        return News::destroy($newId);
    }
}
