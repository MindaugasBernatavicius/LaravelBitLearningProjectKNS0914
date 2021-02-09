<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\ApiBlogPostController;
use App\Http\Controllers\ApiControllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::resource('/posts', ApiBlogPostController::class);
    Route::post('register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'v2'], function () {
    // Dedame kitus kontrolerius ar atliekami kitus skaičiavimus
    // Route::resource('/posts', ApiBlogPostController::class);
});