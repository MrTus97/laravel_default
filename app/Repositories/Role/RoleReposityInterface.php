<?php

namespace App\Repositories\Role;

Interface  RoleReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getDataId($dataId);

    //create
    public function createData(array $data);

    // update 
    public function updateData(array $data,$dataId);

    //delete
    public function deleteData($dataId);
}
