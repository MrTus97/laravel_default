<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\UserInterface;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getUser()
    {
        return User::find(Auth::user()->id);
        // $data ->address;
        // $data ->post;
        // $data ->order;
        // $data ->comments;
    }

}
