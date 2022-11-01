<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class menuApiController extends Controller
{
    private $menu;
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
    public function store(Request $request)
    {
        $storeData = $this->menu->create([
            'name' => $request->name,
            'user_id' => 1
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
    public function update(Request $request, $id)
    {
        $dataUpate = $this->menu->find($id);
        $dataUpate->update([
            'name' => $request->name,
            'user_id' => 1
        ]);
        return response('Updata thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menu->find($id)->delete();
        return response('Xóa Thành Công');
    }
}
