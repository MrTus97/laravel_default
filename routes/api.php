<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;

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
    Route::prefix('menu')->group(function () {
        Route::get('/viewmenu', [MenuController::class, 'index']); 
        Route::post('/addmenu', [MenuController::class, 'store']); 
        Route::post('/id_viewMenu/{id}', [MenuController::class, 'show']);
        Route::put('/updatemenu/{id}', [MenuController::class, 'update']);  
        Route::delete('/deletemenu/{id}', [MenuController::class, 'destroy']);

        
    });
    Route::prefix('product')->group(function () {
        Route::get('/viewproduct', [ProductController::class, 'index']); 
        Route::post('/addproduct', [ProductController::class, 'store']); 
        Route::post('/id_viewproduct/{id}', [ProductController::class, 'show']);
        Route::put('/updateproduct/{id}', [ProductController::class, 'update']);  
        Route::delete('/deleteproduct/{id}', [ProductController::class, 'destroy']);

        
    });
    
});
Route::prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    });

