<?php

namespace App\Repositories\Menu;
//use Your Model
use App\Repositories\Menu\MenuReposityInterface; 
use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class MenuReposiory.
 */
class MenuReposiory implements MenuReposityInterface
{

    //index
   
    public function getAll()
    {
        $returnData = [
            'data' => Menu::get()
         ];
        return $returnData;
    }

    // show id

    public function getMenuId($menuId)
    {
        $getOneData = Menu::find($menuId);
        $getOneData->getUser;
        $getOneData->getNews;
        if(!$getOneData){
            $returnData = [
                'error' => 'Dữ liệu không tồn tại'
             ];
        }
        $returnData = [
            'message' => 'Lấy dữ liệu với id = '. $menuId,
            'data' => $getOneData
         ];
        return $returnData;
        
    }

// create

    public function createMenu(MenuRequest $request)
    {
        $storeData = Menu::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        $storeData->getUser;
        $returnData = [
            'message' => 'Create thành công',
            'data' => $storeData
         ];
        return $returnData;
        
    }

// update

    public function updateMenu($menuId , MenuRequest $request)
    {
        $dataUpate = Menu::find($menuId);
        if(!$dataUpate){
            $returnData = [
                'error' =>'Updata không thành công'
             ];
        }
        $dataUpate->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        $dataUpate->getUser;
        $returnData = [
            'message' => 'Updata thành công',
            'data' => $dataUpate
         ];
        return $returnData;
        
    }

    // destroy

    public function deleteMenu($menuId)
    {
        $deletes = Menu::find($menuId);
        if(!$deletes){
            
            $returnData = [
                'error' => 'Xóa Không Thành Công'
             ];
        }
        $deletes->delete();
        $returnData = [
            'message' => 'Xóa Thành Công'
         ];
        return $returnData;
       
    }
}
