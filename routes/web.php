<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\Manager;

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
Route::post('/modeladd', [ModelController::class, 'addModel'])->name('modeladd');
Route::get('/', [ModelController::class, 'models']);
Route::get('/list', [ModelController::class, 'listmodels']);
Route::post('/toggleSelection', [Manager::class, 'toggleSelection']);
Route::post('/SelectDeleteAll', [Manager::class, 'SelectDeleteAll'])->name('SelectDeleteAll');
Route::get('/selectedModels', [Manager::class, 'getSelectedModels']);
Route::post('/saveSelection', [Manager::class, 'saveSelection']);
Route::get('/Model/{name}', [ModelController::class, 'modelpage']);
Route::post('/deletemodel', [ModelController::class, 'deletemodel'])->name('deletemodel');
Route::post('/modelupdate', [ModelController::class, 'modelupdate'])->name('modelupdate');
Route::post('/men', [Manager::class, 'men'])->name('men');
Route::post('/women', [Manager::class, 'women'])->name('women');

