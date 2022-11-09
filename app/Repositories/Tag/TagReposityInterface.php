<?php

namespace App\Repositories\Tag;


Interface  TagReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getDataId($dataId);

    //create
    public function createData(array $data);

    // update 
    public function updateData(array $data , $id);

    //delete
    public function deleteData($dataId);
}
