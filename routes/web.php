<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\TaskController;
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

Route::resource('task', TaskController::class);
