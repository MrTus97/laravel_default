<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class menuApiController extends Controller
{

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
        // //tẽt
        // $data = User::has('menus.name')->get();

        $dataMenu = DB::table('menus')->get();
        // $dataMenu->getUser;

        return response([
            'message' => 'Show all dữ liệu',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {

        $storeData = Menu::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        $storeData->getUser;
        return response([
            'message' => 'Create thành công',
            'data' => $storeData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getOneData = Menu::find($id);
        $getOneData->getUser;
        $getOneData->getNews;
        if(!$getOneData){
            return response([
                'error' => 'Dữ liệu không tồn tại'

            ]);
        }
        return response([
            'message' => 'Lấy dữ liệu với id = '. $id,
            'data' => $getOneData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $dataUpate = Menu::find($id);
        if(!$dataUpate){
            return response([
                'error' =>'Updata không thành công'
            ]);
        }
        $dataUpate->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        $dataUpate->getUser;
        return response([
            'message' => 'Updata thành công',
            'data' => $dataUpate
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
        $deletes = Menu::find($id);
        if(!$deletes){
            return response([
                'error' => 'Xóa Không Thành Công'
            ]);
        }
        $deletes->delete();
        return response([
            'message' => 'Xóa Thành Công'
        ]);

    }
}
