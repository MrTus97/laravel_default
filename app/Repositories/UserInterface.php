<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface UserInterface 
{
    public function viewUser();
    public function Register(Request $request);
    public function userID(Request $request);

    public function login(Request $request);


}
