<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategroriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function (){
//     $html = "<h1> Học lập trình </h1>";
//     return $html;
// })->name('home');
// Route::get('/', 'App\Http\Controllers\HomeController@index');
// Route::get('/get-new', 'App\Http\Controllers\HomeController@getNews');

// Route::get('category/{id}', [HomeController::class,'getCategory']);

// Route::get('/unicode', function (){
//     return view('form');
// });

// Route::post('/unicode', function (){
//     return 'Đây là unicode';
// });
// Route::put('/unicode', function (){
//     return 'Đây là put unicode';
// });

// Route::match(['get', 'post'], 'unicode', function() {
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('unicode', function (Request $request) {
//     return $request->method();
// });

// Route::get('/show-form', function () {
//     return view('form');
// });

// Route::redirect('unicode', 'show-form', 302);

// Route::view('show-form', 'form');
// Route::prefix('admin')->group(function () {
//     Route::get('/tintuc/{slug}-{id?}', function ($slug, $id = null) {
//         $content = 'Đây là phương thức lấy theo tham số: ';
//         $content .= 'id = ' . $id;
//         return $content;
//     })->where(
//         [
//             'slug' => '[a-z]',
//             'id' => '[0-9]+',
//         ]
//     );

//     Route::get('/show-form', function () {
//         return view('form');
//     });
// });

// Client Route
// Route::prefix('category')->group(function () {
//     // Danh sách chuyên mục
//     Route::get('/', [CategroriesController::class, 'index']);

//     // Lấy chi tiết một chuyên mục
//     Route::get('/edit/{id?}', [CategroriesController::class, 'showForm']);

//     Route::post('/add', [CategroriesController::class, 'add'])->name('category.add');
//     Route::get('/add', [CategroriesController::class, 'showForm']);
// });

// Route::middleware('auth.admin')->prefix('admin')->group(function () {
//     Route::resource('products', ProductsController::class);
// });

// Route::prefix('admin')->group(function () {
//     Route::resource('products', ProductsController::class);
// });

Route::get('create', [ProductsController::class, 'create']);

Route::post('store', [ProductsController::class, 'store']);

Route::get('show', [ProductsController::class, 'index']);
