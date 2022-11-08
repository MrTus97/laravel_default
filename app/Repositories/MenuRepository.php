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
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getAllMenus() 
    {
        return Menu::get();

    }

    public function getMenuById($id) 
    {
        $idMenu = Menu::find($id);
        $idMenu  -> user;
        return $idMenu;

    }

    public function deleteMenu($id) 
    {
        $menuDelete = Menu::find($id);
        $menuDelete->delete();
        return $menuDelete;
    }

    public function createMenu(Request $request) 
    {
        $data = Menu::create([
            'name'=> $request -> name, 
            'user_id'=> Auth::user()-> id,
        ]);
        return $data;
    }

    public function updateMenu(Request $request, $id) 
    {
        $menuUpdate = Menu::find($id);
        $menuUpdate ->update ([
            'name'=>$request->name,
            'user_id' => Auth::user()->id 
            
        ]);

        return $menuUpdate;
    }


}
