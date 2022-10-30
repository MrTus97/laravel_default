<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategroriesController extends Controller
{
    //
    public function __construct()
    {
        
    }

    // GET method
    public function index() {
        return view('clients/categories/list');
    }

    //PUT method
    public function update($id) {

    }
    // GET method
    public function showForm($id=null) {
        return view('clients/categories/form');
        // return 'đã vào hàm show form'.$id;
    }


    // POST method
    public function add() {
        return 'Đã vào hàm add';
    }

    // Delete method
    public function delete($id) {

    }
}
