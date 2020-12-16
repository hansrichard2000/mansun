<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\PeriodeController;
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

Route::group(['middleware'=>'auth:api'], function (){
    Route::apiResource('periode', PeriodeController::class);
});
