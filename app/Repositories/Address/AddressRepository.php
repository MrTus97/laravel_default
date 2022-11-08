<?php

namespace App\Repositories\Address;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Repositories\Address\AddressInterface;

/**
 * Class AddressRepository.
 */
class AddressRepository implements AddressInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getAllAddresses() 
    {
        $Address = Address::get();
        return $Address;
    }

    public function getAddressById($id)
    {
        $idAddress = Address::find($id);
        $idAddress  -> user;
        return $idAddress;
    }
    public function updateAddress(Request $request, $id) 
    {
        $updateAddress = Address::find($id);
        $updateAddress ->update ([
            'street'=>$request->street,
            'state'=>$request->state,
            'city'=>$request->city,
            'user_id' => Auth::user()->id             
        ]);   

        return $updateAddress;
    }
}
