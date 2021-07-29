<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

#===================Cliente==========================#
Route::group([
    'middleware' => 'api',
    'prefix' => 'user'

], function ($router) {
    Route::get('/index/{id?}', [UserController::class,'index']);
    Route::post('/storage', [UserController::class,'storage']);
    Route::post('/edit/{id}', [UserController::class,'edit']);
    Route::delete('/delete/{id}', [UserController::class,'delete']);
});
