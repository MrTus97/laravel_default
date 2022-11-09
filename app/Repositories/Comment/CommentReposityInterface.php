<?php

namespace App\Repositories\Comment;

Interface  CommentReposityInterface {

    public function getAll();
    public function getDataId($dataId);
    public function createData(array $data);
    public function updateData(array $data ,$dataId);
    public function deleteData($dataId);
}
