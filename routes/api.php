<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\menuApiController;

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

Route::prefix('menus')->group(function(){
    Route::get('index', [menuApiController::class , 'index']);
    Route::post('add', [menuApiController::class , 'store']);
    Route::get('show/{id}',[menuApiController::class, 'show']);
    Route::put('update/{id}', [menuApiController::class, 'update']);
    Route::delete('delete/{id}', [menuApiController::class, 'destroy']);
});
