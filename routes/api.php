<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\menuApiController;
use App\Http\Controllers\Api\newApiController;
use App\Http\Controllers\Api\userApiController;
use App\Http\Controllers\Api\tagApiController;
use App\Http\Controllers\Api\commentApiController;
use App\Http\Controllers\Api\roleApiController;


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


// Route::middleware('auth:sanctum')->group(function(){
//     return $request->user();
// });


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::prefix('laravel')->group(function(){

        // menu ------------------------------
        Route::apiResource('menus', menuApiController::class);
        // Route::prefix('menus')->group(function(){
        //     Route::get('index', [menuApiController::class , 'index']);
        //     Route::post('add', [menuApiController::class , 'store']);
        //     Route::get('show/{id}',[menuApiController::class, 'show']);
        //     Route::put('update/{id}', [menuApiController::class, 'update']);
        //     Route::delete('delete/{id}', [menuApiController::class, 'destroy']);
        // });

        //News ------------------------------
        Route::apiResource('news', newApiController::class);

        // Route::prefix('news')->group(function(){
        //     Route::get('index', [newApiController::class, 'index']);
        //     Route::post('add', [newApiController::class , 'store']);
        //     Route::get('show/{id}',[newApiController::class, 'show']);
        //     Route::put('update/{id}', [newApiController::class, 'update']);
        //     Route::delete('delete/{id}', [newApiController::class, 'destroy']);
        // });
        // Tag====================================

        Route::apiResource('tags', tagApiController::class);

        //comment ====================================

        Route::apiResource('comments', commentApiController::class);

        //role ===================================
        Route::apiResource('roles', roleApiController::class);
    });



    Route::get('info', [userApiController::class, 'index']);
    Route::put('user/update/{id}', [userApiController::class, 'update']);


});
Route::prefix('users')->group(function(){
    Route::post('register', [userApiController::class, 'register']);
    Route::get('login', [userApiController::class, 'login']);


});



