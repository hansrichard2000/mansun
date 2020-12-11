<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProkerController;
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
    return redirect()->route('periode.index');
});

Route::resource('periode', PeriodeController::class);

Route::resource('proker', ProkerController::class);

Route::resource('divisi', DivisiController::class);

Route::resource('user', UserController::class);

Route::get('viewlogin', function (){
   return view('login.index');
});

Route::get('profil', function (){
    return view('profil.index');
});

Route::get('addproker', function (){
    return view('proker.add');
});

Route::get('adduser', function (){
    return view('user.crud.create');
});

Route::get('listanggota', function (){
    return view('divisi.crud.read');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
