<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MenuRepository;
use App\Repositories\MenuInterface;

use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Menu;
use DB;
class MenuController extends Controller
{

    public MenuInterface $MenuRepository;

    public function __construct(MenuInterface $MenuRepository) 
    {

        $this->MenuRepository = $MenuRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        return response()->json([
            'data' => $this-> MenuRepository->getAllMenus()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return response()->json(['data' => $this-> MenuRepository->createMenu($request)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return response()->json(['data' => $this-> MenuRepository->getMenuById($id)]);
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

        return response()->json(['data' => $this-> MenuRepository->updateMenu($request, $id)]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'message' => 'đã xóa menu',
            'data'=> $this-> MenuRepository->deleteMenu($id)]);

    }
}
