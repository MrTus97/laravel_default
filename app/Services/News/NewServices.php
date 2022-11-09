<?php
namespace App\Services\News;

use App\Repositories\News\NewReposityInterface;
use App\Http\Requests\NewRequest;
use Illuminate\Support\Facades\Auth;

class NewServices {
    private $newReposiory;
    public function __construct(NewReposityInterface $newReposiory)
    {
        $this->newReposiory = $newReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->newReposiory->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->newReposiory->getNewId($id); 
        if(!$getOneData){
            $returnData = [
                'error' => 'Dữ liệu không tồn tại'
             ];
        }else{
            $getOneData->user;
            $getOneData->menu;
            $getOneData->tag;
            $getOneData->getComment;
            $returnData = [
                'message' => 'Lấy dữ liệu với id = '. $id,
                'data' => $getOneData
             ];
           
        }
        return $returnData;
        
    }
    public function storeData(NewRequest $request)
    {
        
        $uploadFolder = 'news';
        $image = $request->file('image_path');
        $image_path = $image->store($uploadFolder, 'public');
        $nameImage = basename($image_path);
        $menu = [
            'title' => $request->title,
            'content' => $request->content,
            'menu_id' => $request->menu_id,
            'desration' => $request->desration,
            'user_id' => Auth::user()->id,
            'image_name' => $nameImage,
            'image_path' => '/storage/'.$image_path
        ];
        
        $storeData = $this->newReposiory->createNew($menu);
        $storeData->tag()->attach([
            // 1,2,3
            'tag' => $request->tag
        ]);
        if(!$storeData){
            $returnData = [
                'message' => 'Error insert data table role'
             ];
        }else{
            $storeData->user;
            $storeData->menu;
            $storeData->tag;

            $returnData = [
                'message' => 'Insert data table role success',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(NewRequest $request , $id)
    {
        $datacheck = $this->newReposiory->getNewId($id);
        $uploadFolder = 'news';
        $image = $request->file('image_path');
        $image_path = $image->store($uploadFolder, 'public');
        $nameImage = basename($image_path);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'menu_id' => $request->menu_id,
            'desration' => $request->desration,
            'user_id' => Auth::user()->id,
            'image_name' => $nameImage,
            'image_path' => '/storage/'.$image_path
        ];
        if(!$datacheck){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            $this->newReposiory->updateNew($data,$id);
            $datacheck->tag()->sync([
                // 1,2,3
                'tag' => $request->tag
            ]);
            $datacheck->user;
            $datacheck->menu;
            $datacheck->tag;
            $returnData = [
                'message' => 'Updata thành công',
             ];
        }
        return $returnData;
    }
    public function deleteData($id)
    {
        $deletes = $this->newReposiory->getNewId($id);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }else{
            $this->newReposiory->deleteNew($id);
            $returnData = [
                'message' => 'Xóa Thành Công'
             ];
        }
        
        return $returnData;
    }
}