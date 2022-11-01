<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewRequest;

class newApiController extends Controller
{

    public function __construct(News $new)
    {
        $this->new = $new;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = $this->new->get();
        return response([
            'message' => 'Show all dữ liệu',
            'data' => $dataAll
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $storeData = $this->new->create([
            'title' => $request->title,
            'content' => $request->content,
            'menu_id' => $request->menu_id,
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
        $getOneData = $this->new->find($id);
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
    public function update(NewRequest $request, $id)
    {
        $dataUpate = $this->new->find($id);
        $dataUpate->update([
            'title' => $request->title,
            'content' => $request->content,
            'menu_id' => $request->menu_id,
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
        $this->new->find($id)->delete();
        return response('Xóa Thành Công');
    }
}
