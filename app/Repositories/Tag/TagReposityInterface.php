<?php

namespace App\Repositories\Tag;
use Illuminate\Http\Request;

Interface  TagReposityInterface {

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
