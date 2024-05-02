<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PackController;

/* Url Routes */
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
/* User Functions ( Register , Login , Logout ) */
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/userlogin', [UserController::class, 'login'])->name('userlogin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/* Add Model From Editor */
Route::post('/modeladd', [EditorController::class, 'addModel'])->name('modeladd');

/* Get Models For Manager And List Page */
Route::get('/', [GetController::class, 'models']);
Route::get('/list', [GetController::class, 'listmodels']);

/* List Functions */
Route::get('/list', [GetController::class, 'listsearchModels']);
Route::post('/deletemodel', [ListController::class, 'deletemodel'])->name('deletemodel');

/* Manager Selections */
Route::post('/toggleSelection', [ManagerController::class, 'toggleSelection']);
Route::post('/SelectDeleteAll', [ManagerController::class, 'SelectDeleteAll'])->name('SelectDeleteAll');
Route::get('/selectedModels', [ManagerController::class, 'getSelectedModels']);
Route::post('/saveSelection', [ManagerController::class, 'saveSelection']);
Route::post('/men', [ManagerController::class, 'men'])->name('men');
Route::post('/women', [ManagerController::class, 'women'])->name('women');
Route::get('/searchModels', [ManagerController::class, 'searchModels'])->name('searchModels');

/* Go To The Model Page */
Route::get('/Model/{name}', [GetController::class, 'modelpage']);

/* Model Page Functions */
Route::post('/modelupdate', [ModelController::class, 'modelupdate'])->name('modelupdate');
Route::post('/photodelete', [ModelController::class, 'photodelete'])->name('photodelete');
Route::post('/videodelete', [ModelController::class, 'videodelete'])->name('videodelete');
Route::post('/addbook', [ModelController::class, 'addbook'])->name('addbook');
Route::post('/adddigital', [ModelController::class, 'adddigital'])->name('adddigital');
Route::post('/addvideo', [ModelController::class, 'addvideo'])->name('addvideo');
Route::post('/photoorderupdate', [ModelController::class, 'photoorderupdate'])->name('photoorderupdate');

/* Pack Functions */
Route::get('/Pack', [PackController::class, 'decryptModels']);
Route::get('/get-model-data/{id}', [PackController::class, 'getModelData']);
/* Download Model Photos And Videos */
Route::post('/downloadphotos', [PackController::class, 'downloadphotos'])->name('downloadphotos');
Route::post('/downloadVideos', [PackController::class, 'downloadVideos'])->name('downloadVideos');
