<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\MenuInterface;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Repositories\UserRepository;

class MenuService   
{
    public MenuInterface $MenuRepository;

    public function __construct(MenuInterface $MenuRepository) 
    {

        $this->MenuRepository = $MenuRepository;
    }





    public function index()
    {
 
        return response()->json([
            'data' => $this-> MenuRepository->getAllMenus()
        ]);
        
    }

    
    public function createMenu(Request $request)
    {

        // $data = Menu::create([
        //     'name'=> $request -> name, 
        //     'user_id'=> Auth::user()-> id,
        // ]);
        // return $data;
        // return response()->json([
        //     $this ->Menu::create(),

        // ]);
        
        $data =[
            'name'=> $request -> name, 
            'user_id'=> Auth::user()-> id,
        ];
        
        return response()->json(['data' => $this-> MenuRepository->createMenu($data)]);
    }

    public function getMenuById($id)
    {
        $idMenu = $this-> MenuRepository->getMenuById($id);
        $idMenu  -> user;
        return $idMenu;
        
    }

    public function updateMenu(Request $request, $id) 
    {

        $menuUpdate=([
            'name'=>$request->name,
            'user_id' => Auth::user()->id            
        ]);

        return response()->json([
            'info'=>$menuUpdate,
            'data' => $this-> MenuRepository->updateMenu($menuUpdate, $id)]);
    }
    public function deleteMenu($id) 
    {
        $menuDelete = Menu::find($id);
        $menuDelete->delete();
        return $menuDelete;
    }
}