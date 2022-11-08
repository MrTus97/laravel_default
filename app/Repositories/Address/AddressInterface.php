<?php

namespace App\Repositories\Address;
use Illuminate\Http\Request;

interface AddressInterface 
{
    public function getAllAddresses();
    public function getAddressById($id);
    public function updateAddress(Request $request, $id);
}
