<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\menuApiController;
use App\Http\Controllers\Api\newApiController;

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


Route::middleware('auth:sanctum')->group(function(){
    return response('hfidfhdfhdif');
});


Route::prefix('laravel')->group(function(){
    Route::prefix('menus')->group(function(){
        Route::get('index', [menuApiController::class , 'index']);
        Route::post('add', [menuApiController::class , 'store']);
        Route::get('show/{id}',[menuApiController::class, 'show']);
        Route::put('update/{id}', [menuApiController::class, 'update']);
        Route::delete('delete/{id}', [menuApiController::class, 'destroy']);
    });
    Route::prefix('news')->group(function(){
        Route::get('index', [newApiController::class, 'index']);
        Route::post('add', [newApiController::class , 'store']);
        Route::get('show/{id}',[newApiController::class, 'show']);
        Route::put('update/{id}', [newApiController::class, 'update']);
        Route::delete('delete/{id}', [newApiController::class, 'destroy']);
    });
});

