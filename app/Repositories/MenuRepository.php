<?php

namespace App\Repositories;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\MenuInterface;

//use Your Model

/**
 * Class MenuRepository.
 */
class MenuRepository implements MenuInterface
{
    public function getAllMenus() 
    {
        return Menu::get();

    }

    public function getMenuById($id) 
    {
        // $idMenu = Menu::find($id);
        // $idMenu  -> user;
        return Menu::find($id);
    }

    public function deleteMenu($id) 
    {
        $menuDelete = Menu::find($id);
        $menuDelete->delete();
        return $menuDelete;
    }

    public function createMenu(array $request ) 
    {

        return Menu::create($request);

    }

    public function updateMenu(array $request, $id) 
    {
        // $menuUpdate = Menu::find($id);
        // $menuUpdate ->update ([
        //     'name'=>$request->name,
        //     'user_id' => Auth::user()->id 
            
        // ]);

        // return $menuUpdate;

        return Menu::find($id)->update([
            $request
        ]);
    }


}
