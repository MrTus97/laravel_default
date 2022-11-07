<?php

namespace App\Repositories\Role;
use Illuminate\Http\Request;

Interface  RoleReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getDataId($dataId);

    //create
    public function createData(Request $request);

    // update 
    public function updateData($dataId , Request $request);

    //delete
    public function deleteData($dataId);
}
