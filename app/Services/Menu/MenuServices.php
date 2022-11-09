<?php
namespace App\Services\Menu;
use App\Models\Menu;
use App\Repositories\Menu\MenuReposityInterface;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Auth;

class MenuServices {
    private $menuRepository;
    public function __construct(MenuReposityInterface $menuReposiory)
    {
        $this->menuRepository = $menuReposiory;
    }
    public function index()
    {
        $returnData = [
            'data' => $this->menuRepository->getAll()
         ];
        return $returnData;

    }
    public function showId($id)
    {
        $getOneData = $this->menuRepository->getMenuId($id); 
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
            $getOneData->getNews;
           
        }
        return $returnData;
        
    }
    public function storeData(MenuRequest $request)
    {
        $menu = [
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ];
        
        $storeData = $this->menuRepository->createMenu($menu);
        if(!$storeData){
            $returnData = [
                'message' => 'Create Không công'
             ];
        }else{
            $storeData->getUser;
            $returnData = [
                'message' => 'Create thành công',
                'data' => $storeData
             ];       
        }     
        return $returnData;
    }
    public function updateData(MenuRequest $request , $id)
    {
        $data = $this->menuRepository->getMenuId($id);
      
        $menu = [
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ];
        if(!$data){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }else{
            $this->menuRepository->updateMenu($menu,$id);
           
            // $data->getUser;
            $returnData = [
                'message' => 'Updata thành công',
                
             ];
        }
        return $returnData;
    }
    public function deleteData($id)
    {
        $deletes = $this->menuRepository->getMenuId($id);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }else{
            $this->menuRepository->deleteMenu($id);
            $returnData = [
                'message' => 'Xóa Thành Công'
             ];
        }
        
        return $returnData;
    }
}