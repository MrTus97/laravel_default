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

    public function __construct(Menu $menu){
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataMenu = $this->menu->get();

        return response([
            'message' => 'Show all dữ liệu',
            'data' => $dataMenu
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

        $storeData = $this->menu->create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
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
        $getOneData = $this->menu->find($id);
        $getOneData->getUser;
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
        $dataUpate = $this->menu->find($id);
        if(!$dataUpate){
            return response([
                'error' =>'Updata không thành công'
            ]);
        }
        $dataUpate->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
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
        $deletes = $this->menu->find($id);
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
