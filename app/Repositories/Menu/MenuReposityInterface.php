<?php

namespace App\Repositories\Menu;
use App\Http\Requests\MenuRequest;

Interface  MenuReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getMenuId($menuId);

    //create
    public function createMenu(array $menu);

    // update 
    public function updateMenu(array $menu,$id);

    //delete
    public function deleteMenu($menuId);
}
