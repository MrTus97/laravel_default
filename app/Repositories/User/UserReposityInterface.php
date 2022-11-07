<?php

namespace App\Repositories\User;
use Illuminate\Http\Request;

Interface  UserReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getDataId($dataId);

    //create
    public function createData(Request $request);

    // update 
    public function updateData($dataId , Request $request);

    //delete
    // public function deleteData($dataId);

    public function login(Request $request);

    public function getUser();
}
