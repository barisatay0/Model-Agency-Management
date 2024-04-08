<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome',['name' => 'James']);
});
Route::get('/Login', function () {
    return view('login');
});
Route::get('/Signup', function () {
    return view('signup');
});
Route::get('/Editor', function () {
    return view('editor');
});
Route::get('/Pack', function () {
    return view('pack');
});
Route::post('/register', 'App\Http\Controllers\UserController@store')->name('register');
Route::post('/userlogin', 'App\Http\Controllers\AuthController@login')->name('userlogin');


