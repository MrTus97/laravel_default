<?php
namespace App\Services\Tag;

use Illuminate\Http\Request;
use App\Repositories\Tag\TagReposityInterface;
use Illuminate\Support\Facades\Auth;

class TagServices {
    private $tagReposiory;
    public function __construct(TagReposityInterface $tagReposiory)
    {
        $this->tagReposiory = $tagReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->tagReposiory->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->tagReposiory->getDataId($id); 
        if(!$getOneData){
            $returnData = [
                'error' => 'Dữ liệu không tồn tại'
             ];
        }else{
            $returnData = [
                'message' => 'Lấy dữ liệu với id = '. $id,
                'data' => $getOneData
             ];
           
        }
        return $returnData;
        
    }
    public function storeData(Request $request)
    {
        $menu = [
            'name' => $request->name,
        ];
        
        $storeData = $this->tagReposiory->createData($menu);
        if(!$storeData){
            $returnData = [
                'message' => 'Error insert data table role'
             ];
        }else{
            $storeData->getUser;
            $returnData = [
                'message' => 'Insert data table role success',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(Request $request , $id)
    {
        $datacheck = $this->tagReposiory->getDataId($id);
      
        $data = [
            'name' => $request->name,
        ];
        if(!$datacheck){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            $this->tagReposiory->updateData($data,$id);
           
            // $data->getUser;
            $returnData = [
                'message' => 'Updata thành công',
             ];
        }
        return $returnData;
    }
    public function deleteData($id)
    {
        $deletes = $this->tagReposiory->getDataId($id);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }else{
            $this->tagReposiory->deleteData($id);
            $returnData = [
                'message' => 'Xóa Thành Công'
             ];
        }
        
        return $returnData;
    }
}