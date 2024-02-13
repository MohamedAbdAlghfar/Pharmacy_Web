<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{SignupController,LoginController,LogoutController};
use App\Http\Controllers\Medicine\{CreateMedicineController,EditMedicineController,DeleteMedicineController,ShowAllMedicinesController,ShowMedicineController,GetMedicineByQRController,FilterMedicineByPriceController,FilterMedicineByTypeController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [LoginController::class , 'login']); 
    Route::post('logout', [LogoutController::class , 'logout']);
    Route::post('register', [SignupController::class , 'signup']);
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'medicine'

], function ($router) {

    Route::post('create', [CreateMedicineController::class , 'index']);
    Route::post('edit/{medicine_id}', [EditMedicineController::class , 'index']);
    Route::delete('delete/{medicine_id}', [DeleteMedicineController::class , 'index']);   
    Route::get('showAll', [ShowAllMedicinesController::class , 'index']);  
    Route::get('show/{medicine_id}', [ShowMedicineController::class , 'index']); 
    Route::get('get/{medicine_QR}', [GetMedicineByQRController::class , 'index']);
    Route::get('price-range/{minPrice}/{maxPrice}', [FilterMedicineByPriceController::class , 'index']);
    Route::get('type/{type}', [FilterMedicineByTypeController::class , 'index']);
});
 

















