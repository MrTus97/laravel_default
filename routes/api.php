<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;



use App\Http\Controllers\AuthController;
use App\Http\Middleware\VerifyJWTToken;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(VerifyJWTToken::class)->prefix('demo')->group(function(){
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    Route::post('/logout', [AuthController::class, 'logout']); 

    Route::get('/user_id', [AuthController::class, 'getuserid']); 
    Route::get('/user_comment', [AuthController::class, 'getusercm']); 



    Route::post('/post', [PostController::class, 'store']); 
    Route::get('/viewPost', [PostController::class, 'index']); 
    Route::get('/id_viewPost/{id}', [PostController::class, 'show']); 



    Route::post('/addOrder', [OrderController::class, 'store']);
    Route::get('/viewOrder', [OrderController::class, 'index']); 
    Route::get('/id_viewOrder/{id}', [OrderController::class, 'show']); 


    Route::post('/addComment', [CommentController::class, 'store']);
    Route::get('/viewComment', [CommentController::class, 'index']);
    Route::get('/id_viewComment/{id}', [CommentController::class, 'show']); 








    Route::prefix('menu')->group(function () {
        Route::get('/viewMenu', [MenuController::class, 'index']); 
        Route::post('/addMenu', [MenuController::class, 'store']); 
        Route::post('/id_viewMenu/{id}', [MenuController::class, 'show']);
        Route::put('/updateMenu/{id}', [MenuController::class, 'update']);  
        Route::delete('/deleteMenu/{id}', [MenuController::class, 'destroy']);

        
    });
    Route::prefix('product')->group(function () {
        Route::get('/viewProduct', [ProductController::class, 'index']); 
        Route::post('/addProduct', [ProductController::class, 'store']); 
        Route::post('/id_viewProduct/{id}', [ProductController::class, 'show']);
        Route::put('/updateProduct/{id}', [ProductController::class, 'update']);  
        Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy']);

        
    });
    
});
Route::prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

