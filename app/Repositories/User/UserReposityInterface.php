<?php

namespace App\Repositories\User;

Interface  UserReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getDataId($dataId);

    //create
    public function createData(array $data);

    // update 
    public function updateData( array $data,$dataId);

    //delete
    // public function deleteData($dataId);



    public function getUser();

    public function getEmail($email);
}
