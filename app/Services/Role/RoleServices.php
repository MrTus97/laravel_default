<?php
namespace App\Services\Role;


use App\Repositories\Role\RoleReposityInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleServices {
    private $RoleReposiory;
    public function __construct(RoleReposityInterface $RoleReposiory)
    {
        $this->RoleReposiory = $RoleReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->RoleReposiory->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->RoleReposiory->getDataId($id); 
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
        $data = [
            'name' => $request->name,
        ];
        
        $storeData = $this->RoleReposiory->createData($data);
        if(!$storeData){
            $returnData = [
                'message' => 'Error insert data table'
             ];
        }else{
            // $storeData->getUser;
            $returnData = [
                'message' => 'Insert data table success',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(Request $request , $id)
    {
        $datacheck = $this->RoleReposiory->getDataId($id);
      
        $data = [
            'name' => $request->name,
            
        ];
        if(!$datacheck){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            $this->RoleReposiory->updateData($data,$id);
            $returnData = [
                'message' => 'Updata thành công',
             ];
        }
        return $returnData;
    }
    public function deleteData($id)
    {
        $deletes = $this->RoleReposiory->getDataId($id);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }else{
            $this->RoleReposiory->deleteData($id);
            $returnData = [
                'message' => 'Xóa Thành Công'
             ];
        }
        
        return $returnData;
    }
}