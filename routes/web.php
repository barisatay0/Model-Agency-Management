<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelController;

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
Route::post('/toggleSelection', [ModelController::class, 'toggleSelection']);
Route::post('/SelectDeleteAll', [ModelController::class, 'SelectDeleteAll'])->name('SelectDeleteAll');
Route::get('/selectedModels', [ModelController::class, 'getSelectedModels']);
Route::post('/saveSelection', [ModelController::class, 'saveSelection']);
Route::get('/Model/{name}', [ModelController::class, 'modelpage']);
Route::post('/deletemodel', [ModelController::class, 'deletemodel'])->name('deletemodel');
