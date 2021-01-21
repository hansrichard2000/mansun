<?php

use App\Http\Controllers\Api\Admin\DivisiController;
use App\Http\Controllers\Api\Admin\JadwalController;
use App\Http\Controllers\Api\Admin\ProfilController;
use App\Http\Controllers\Api\Admin\ProkerController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\TaskController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Admin\PeriodeController;
use App\Http\Controllers\Api\User\PeriodeController as UserPeriodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('api-login', [LoginController::class, 'login']);
Route::post('api-refresh', [LoginController::class, 'refresh']);

Route::group(['middleware'=>'auth:api'], function (){
    Route::apiResource('periode', PeriodeController::class);
    Route::apiResource('proker', ProkerController::class);
    Route::apiResource('divisi', DivisiController::class);
    Route::apiResource('task', TaskController::class);
    Route::apiResource('jadwal', JadwalController::class);
    Route::apiResource('profil', ProfilController::class);
    Route::apiResource('role', RoleController::class);
    Route::post('api-logout', [LoginController::class, 'logout']);
});

//Route::group(['middleware'=>'auth:api-members'], function (){
//    Route::apiResource('periode-member', UserPeriodeController::class);
//    Route::post('api-logout', [LoginController::class, 'logout']);
//});
//Route::get('/members', function () {
//    Route::apiResource('periode-member', UserPeriodeController::class);
//    Route::post('api-logout', [LoginController::class, 'logout']);
//})->middleware('auth:api-members');
