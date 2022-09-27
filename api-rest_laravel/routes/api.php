<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('stores',\App\Http\Controllers\Api\StoreController::class )
->only('index', 'show');


Route::apiResource('stores',\App\Http\Controllers\Api\StoreController::class )
->only('store', 'update', 'delete')
->middleware('auth:sanctum');

Route::apiResource('stores.products',\App\Http\Controllers\Api\ProductController::class );


Route::prefix('auth')->group(function(){
  Route::post('login', 
  [\App\Http\Controllers\Auth\Api\LoginController::class, 'login']);

  Route::post('logout', 
  [\App\Http\Controllers\Auth\Api\LoginController::class, 'logout'])
  ->middleware('auth:sanctum');

  Route::post('register', 
  [\App\Http\Controllers\Auth\Api\RegisterController::class, 'Register']);
});