<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Action index
    public function index() {
        return 'home';
    }

    public function getNews() {
        return 'danh sách tin tức';
    }

    public function getCategory($id) {
        return 'Chuyên mục'.$id;
    }
}
