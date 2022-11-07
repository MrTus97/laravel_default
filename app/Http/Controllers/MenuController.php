<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MenuRepository;

use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Menu;
use DB;
class MenuController extends Controller
{

    public MenuRepository $MenuRepository;

    public function __construct(MenuRepository $MenuRepository, Menu $menu) 
    {
        $this->menu = $menu;
        $this->MenuRepository = $MenuRepository;
    }
    // public function __construct(Menu $menu){
    //     $this->menu = $menu;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $index = Menu::get();
        return response()->json($index);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = Menu::create([
            'name'=> $request -> name, 
            'user_id'=> Auth::user()-> id,
        ]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idMenu = $this -> menu->find($id);
        $idMenu  -> user;
        return response([
            'data' => $idMenu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       
        $menuUpdate = $this -> menu->find($id);
        $menuUpdate ->update ([
            'name'=>$request->name,
            'user_id' => Auth::user()->id 
            
        ]);
       
        return response([
            'data' => $menuUpdate,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuDelete = $this -> menu->find($id);
        $menuDelete->delete();
        return response([
            'message' => 'đã xóa'
        ]);

    }
}
