<?php

namespace App\Repositories\New;

use App\Models\News;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\NewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\New\NewReposityInterface; 

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
        $returnData = [
            'message' => 'Show all dữ liệu',
            'data' => News::get()
        ];
        return $returnData;
        
    }
    public function getNewId($newId)
    {
        $data =  News::where('id',$newId)->first();
        if(!$data){
            return response([
                'error' => 'Lấy dữ liệu thất bại'
            ]);
        }
        $data->user;
        $data->menu;
        $data->tag;
        $data->getComment;
        $returnData = [
            'message' => 'Show all dữ liệu theo id',
            'data' => $data
        ];
        return $returnData;
    }
    public function createNew(NewRequest $request)
    {
        $uploadFolder = 'news';
        $image = $request->file('image_path');
        $image_path = $image->store($uploadFolder, 'public');
        $nameImage = basename($image_path);
        
            $storeData = News::create([
                'title' => $request->title,
                'content' => $request->content,
                'menu_id' => $request->menu_id,
                'desration' => $request->desration,
                'user_id' => Auth::user()->id,
                'image_name' => $nameImage,
                'image_path' => '/storage/'.$image_path
            ]);
            $storeData->tag()->attach([
                // 1,2,3
                'tag' => $request->tag
            ]);

            $storeData->user;
            $storeData->menu;
            $storeData->tag;
            $returnData = [
                'message' => 'Insert success',
                'data' => $storeData
            ];
            return $returnData;
    }
    public function updateNew($newId, NewRequest $request)
    {
        $uploadFolder = 'news';
        $image = $request->file('image_path');
        $image_path = $image->store($uploadFolder, 'public');
        $nameImage = basename($image_path);

        $data = News::find($newId);
        $dataUpate = $data->update([
            'title' => $request->title,
            'content' => $request->content,
            'menu_id' => $request->menu_id,
            'desration' => $request->desration,
            'user_id' => Auth::user()->id,
            'image_name' => $nameImage,
            'image_path' => '/storage/'.$image_path
        ]);
        $data->tag()->sync([
            // 1,2,3
            'tag' => $request->tag
        ]);
        $data->user;
        $data->menu;
        $data->tag;
        $returnData = [
            'message' => 'Update thành công',
            'data' => $data
        ];
        return $returnData;
       
    }
    public function deleteNew($newId)
    {
        $deletes = News::destroy($newId);
        if(!$deletes){
            return response([
                'error' => 'Xóa Không Thành Công'
            ]);
        }
        $returnData = [
            'massage' => 'Xóa Thành Công',
            'data' =>$deletes
        ];
        
        return $returnData;
    }
}
