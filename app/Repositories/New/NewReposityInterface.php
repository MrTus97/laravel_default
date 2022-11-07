<?php

namespace App\Repositories\New;
use App\Http\Requests\NewRequest;

Interface  NewReposityInterface {

    //index
    public function getAll();
    
    //show id
    public function getNewId($newId);

    //create
    public function createNew(NewRequest $request);

    // update 
    public function updateNew($newId, NewRequest $request);

    //delete
    public function deleteNew($newId);
}
