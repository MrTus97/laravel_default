<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address\Repositories\AddressRepository;
use App\Repositories\Address\AddressInterface;

class AddressController extends Controller
{
    
    private $AddressRepository;

    public function __construct(AddressInterface $AddressRepository) 
    {
        $this->AddressRepository = $AddressRepository;
    }
    public function index()
    {
        return response()->json(['data'=> $this->AddressRepository->getAllAddresses()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'data'=> $this->AddressRepository->getAddressById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'data'=> $this ->AddressRepository->updateAddress($request, $id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
