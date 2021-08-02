<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', function () {

    $lista =  json_decode(User::orderBy('id','DESC')->get());

    return view('home', ['lista' => $lista??[]]);

})->name('home');

Route::get('/novo', function(){

    return view('newUser');

})->name('new.user');

Route::get('/editar/{id}', function($id){

    $user = json_decode(User::find($id));

    if($user)
        return view('editUser', ["user" => $user]);
    return redirect('/404');

})->name('edit.user');
