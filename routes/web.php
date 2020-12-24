<?php

use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\ProkerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
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

Route::group([
    'middleware' => 'admin',
    'prefix' =>'admin',
    'as' => 'admin.',
], function(){
    Route::post('user/suspend', [UserController::class, 'suspend'])->name('user.suspend');
    Route::post('user/active', [UserController::class, 'active'])->name('user.active');

    Route::resource('periode', PeriodeController::class);
    Route::resource('proker', ProkerController::class);
    Route::resource('divisi', DivisiController::class);
    Route::resource('user', UserController::class);
    Route::resource('task', TaskController::class);
    Route::resource('role', RoleController::class);
    Route::resource('profil', ProfilController::class);
});


Route::get('viewlogin', function (){
   return view('login.index');
});

//Route::get('profil', function (){
//    return view('profil.index');
//});

Route::get('listanggota', function (){
    return view('divisi.crud.listAnggota');
});

//Route::get('usermanagement', function (){
//    return view('user.index');
//});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
