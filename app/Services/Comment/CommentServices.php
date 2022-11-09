<?php
namespace App\Services\Comment;

use App\Repositories\Comment\CommentReposityInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentServices {
    private $commentReposiory;
    public function __construct(CommentReposityInterface $commentReposiory)
    {
        $this->commentReposiory = $commentReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->commentReposiory->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->commentReposiory->getDataId($id); 
        if(!$getOneData){
            $returnData = [
                'error' => 'Dữ liệu không tồn tại'
             ];
        }else{
            $returnData = [
                'message' => 'Lấy dữ liệu với id = '. $id,
                'data' => $getOneData
             ];
             $getOneData->getUser;
             $getOneData->getNew;
           
        }
        return $returnData;
        
    }
    public function storeData(Request $request)
    {
        $data = [
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'new_id' => $request->new_id
        ];
        
        $storeData = $this->commentReposiory->createData($data);
        if(!$storeData){
            $returnData = [
                'message' => 'Error insert data table'
             ];
        }else{
            $storeData->getUser;
            $returnData = [
                'message' => 'Insert data table success',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(Request $request , $id)
    {
        $datacheck = $this->commentReposiory->getDataId($id);
      
        $data = [
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'new_id' => $request->new_id
        ];
        if(!$datacheck){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            $this->commentReposiory->updateData($data,$id);
            $returnData = [
                'message' => 'Updata thành công',
             ];
        }
        return $returnData;
    }
    public function deleteData($id)
    {
        $deletes = $this->commentReposiory->getDataId($id);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }else{
            $this->commentReposiory->deleteData($id);
            $returnData = [
                'message' => 'Xóa Thành Công'
             ];
        }
        
        return $returnData;
    }
}