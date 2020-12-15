<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::resource('periode', PeriodeController::class);

Route::resource('proker', ProkerController::class);

Route::resource('divisi', DivisiController::class);

Route::resource('user', UserController::class);

Route::resource('task', TaskController::class);

Route::get('viewlogin', function (){
   return view('login.index');
});

Route::get('profil', function (){
    return view('profil.index');
});

Route::get('adduser', function (){
    return view('user.crud.create');
});

Route::get('listanggota', function (){
    return view('divisi.crud.listAnggota');
});

//Route::get('usermanagement', function (){
//    return view('user.index');
//});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
