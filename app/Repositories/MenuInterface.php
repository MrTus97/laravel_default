<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface MenuInterface 
{
    public function getAllMenus();
    public function getMenuById($id);
    public function createMenu(Request $request);
    public function updateMenu(Request $request,$id);
    public function deleteMenu($id);


}
