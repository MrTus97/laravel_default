<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface MenuInterface 
{
    public function getAllMenus();
    public function getMenuById($id);
    public function createMenu(array $request);
    public function updateMenu(array $request,$id);
    public function deleteMenu($id);


}
