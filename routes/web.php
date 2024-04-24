<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ManagerController;

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
    if (Auth::check()) {
        return view('/manager');
    } else {
        return redirect('/Login');
    }
});


Route::get('/Login', function () {
    return view('login');
});
Route::get('/Signup', function () {
    if (Auth::check()) {
        return view('/signup');
    } else {
        return redirect('/Login');
    }
});
Route::get('/Editor', function () {
    if (Auth::check()) {
        return view('/editor');
    } else {
        return redirect('/Login');
    }
});
Route::get('/Pack', function () {
    if (Auth::check()) {
        return view('/pack');
    } else {
        return redirect('/Login');
    }
});
Route::get('/List', function () {
    if (Auth::check()) {
        return view('/list');
    } else {
        return redirect('/Login');
    }
});
Route::get('/Model', function () {
    if (Auth::check()) {
        return view('/model');
    } else {
        return redirect('/Login');
    }
});
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/userlogin', [UserController::class, 'login'])->name('userlogin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/modeladd', [EditorController::class, 'addModel'])->name('modeladd');
Route::get('/', [GetController::class, 'models']);
Route::get('/list', [GetController::class, 'listmodels']);
Route::post('/toggleSelection', [ManagerController::class, 'toggleSelection']);
Route::post('/SelectDeleteAll', [ManagerController::class, 'SelectDeleteAll'])->name('SelectDeleteAll');
Route::get('/selectedModels', [ManagerController::class, 'getSelectedModels']);
Route::post('/saveSelection', [ManagerController::class, 'saveSelection']);
Route::get('/Model/{name}', [GetController::class, 'modelpage']);
Route::post('/deletemodel', [ListController::class, 'deletemodel'])->name('deletemodel');
Route::post('/modelupdate', [ModelController::class, 'modelupdate'])->name('modelupdate');
Route::post('/men', [ManagerController::class, 'men'])->name('men');
Route::post('/women', [ManagerController::class, 'women'])->name('women');
Route::post('/photodelete', [ModelController::class, 'photodelete'])->name('photodelete');
Route::post('/videodelete', [ModelController::class, 'videodelete'])->name('videodelete');

