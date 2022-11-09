<?php

namespace App\Repositories\News;

Interface  NewReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getNewId($newId);

    //create
    public function createNew(array $data);

    // update 
    public function updateNew(array $data,$newId);

    //delete
    public function deleteNew($newId);
}
