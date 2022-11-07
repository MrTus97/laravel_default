<?php

namespace App\Repositories\Menu;
use App\Http\Requests\MenuRequest;

Interface  MenuReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getMenuId($menuId);

    //create
    public function createMenu(MenuRequest $request);

    // update 
    public function updateMenu($menuId , MenuRequest $request);

    //delete
    public function deleteMenu($menuId);
}
