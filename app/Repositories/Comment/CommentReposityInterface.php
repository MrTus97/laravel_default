<?php

namespace App\Repositories\Comment;
use Illuminate\Http\Request;

Interface  CommentReposityInterface {

    public function getAll();
    public function getDataId($dataId);
    public function createData(Request $request);
    public function updateData($dataId , Request $request);
    public function deleteData($dataId);
}
