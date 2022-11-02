<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Menu;
use App\Http\Requests\NewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class newApiController extends Controller
{

    public function __construct(News $new, Menu $menu)
    {
        $this->new = $new;
        $this->menu = $menu;
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

        $check =$this->menu->where('id', $request->menu_id)->exists();
           if($check){
                $uploadFolder = 'news';
                $image = $request->file('image_path');
                $nameImage = $image->getClientOriginalName();
                $image_path = $nameImage->store($uploadFolder, 'public');

                $storeData = $this->new->create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'menu_id' => $request->menu_id,
                    'user_id' => Auth::user()->id,
                    'image_name' => $nameImage,
                    'image_path' => '/storage/'.$image_path
            ]);

            return response([
                'message' => 'Create thành công',
                'data' => $storeData
            ]);

           }else{
                return response([
                    'error' =>'Không tồn tại menu_id'
                ]);
           }




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
        if(!$getOneData){
            return response([
                'message' => 'Lấy dữ liệu thất bại'
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
    public function update(NewRequest $request, $id)
    {
        $dataUpate = $this->new->find($id);

        if($dataUpate){
            $check =$this->menu->where('id', $request->menu_id)->exists();
            if($check){
                $dataUpate->update([
                        'title' => $request->title,
                        'content' => $request->content,
                        'menu_id' => $request->menu_id,
                        'user_id' => Auth::user()->id
                    ]);
                return response([
                    'massage' => 'Updata thành công',
                    'data' => $dataUpate
                ]);
            }else{
                return response([
                    'error' => 'Không tồn tại menu_id'
                ]);
            }

        }else{
            return response([
                'error' => 'Dữ liệu không tồn tại'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletes = $this->new->find($id);
        if(!$deletes){
            return response([
                'error' => 'Xóa Không Thành Công'
            ]);
        }
        $deletes->delete();
        return response([
            'massage' => 'Xóa Thành Công'
        ]);
    }
}
