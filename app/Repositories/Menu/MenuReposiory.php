<?php

namespace App\Repositories\Menu;
//use Your Model
use App\Repositories\Menu\MenuReposityInterface; 
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

/**
 * Class MenuReposiory.
 */
class MenuReposiory implements MenuReposityInterface
{

    //index
   
    public function getAll()
    {
        return Menu::with('getUser','getNews')->get();
    }

    // show id

    public function getMenuId($menuId)
    {
        
        return Menu::find($menuId);
        
    }

// create

    public function createMenu(array $menu)
    {
       return Menu::create($menu);
    }

// update

    public function updateMenu(array $menu ,$id)
    {
        return DB::table('menus')->where('id',$id)->update($menu);
        
    }

    // destroy

    public function deleteMenu($menuId)
    {
        return DB::table('menus')->delete($menuId);
       
    }
}
