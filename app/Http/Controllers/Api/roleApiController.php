<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class roleApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('roles')->get();
        return response([
            'message' => 'get all data',
            'data' => $data
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
        $insertData = DB::table('roles')->insert([
            'name' => $request->name
        ]);
        if(!$insertData){
            return response([
                'error' => ' Error insert data table role',

            ]);
        }
        return response([
            'message' => 'insert data table role',
            // 'data' => $insertData
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
        $dataId = Role::find($id);
        // $dataId->getUser;
        // $dataId->getNew;
        return response([
            'message' => 'get data follew id',
            'data' => $dataId
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

        $insertData = DB::table('roles')->where('id',$id)->update([
            'name' => $request->name
        ]);
        if(!$insertData){
            return response([
                'error' => ' Error Update data table role',

            ]);
        }
        return response([
            'message' => 'Update data table role',
            // 'data' => $insertData
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
        //
    }
}
