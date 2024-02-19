<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{SignupController,
                               LoginController,
                               LogoutController};

use App\Http\Controllers\Medicine\{CreateMedicineController,
                                   EditMedicineController,
                                   DeleteMedicineController,
                                   ShowAllMedicinesController,
                                   ShowMedicineController,
                                   GetMedicineByQRController,
                                   FilterMedicineByPriceController,
                                   FilterMedicineByTypeController,
                                   AttachMedicinePharmacyController};

 use App\Http\Controllers\Order\{MakeOrderController,
                                 CancelOrderController,
                                 ShowAllOrdersController,
                                 PrintOrderController,
                                 OrdersinThisDayController,
                                 OrdersinThisWeekController};

use App\Http\Controllers\Pharmacy\{CreatePharmacyController,
                                   EditPharmacyController,
                                   DeletePharmacyController,
                                   ShowAllPharmaciesController,
                                   ShowPharmacyController};

use App\Http\Controllers\User\{ViewMyProfileController,
                               EditMyProfileController,
                               DeleteMyProfileController,
                               ViewUsersController,
                               DeleteUserController,
                               EditUserController,
                               MakeOwnerController};

use App\Http\Controllers\Statistics\{TotalOrderPriceInThisDayController,
                                     TotalOrderPriceInThisMonthController};

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

    Route::group(['middleware' => ['Is_Admin']],function () {

    Route::post('create', [CreateMedicineController::class , 'index']);
    Route::post('edit/{medicine_id}', [EditMedicineController::class , 'index']);
    Route::delete('delete/{medicine_id}', [DeleteMedicineController::class , 'index']);   
    Route::get('showAll', [ShowAllMedicinesController::class , 'index']);  
    Route::get('show/{medicine_id}', [ShowMedicineController::class , 'index']); 
    Route::get('get/{medicine_QR}', [GetMedicineByQRController::class , 'index']);
    Route::get('price-range/{minPrice}/{maxPrice}', [FilterMedicineByPriceController::class , 'index']);
    Route::get('type/{type}', [FilterMedicineByTypeController::class , 'index']);
    Route::post('attach/{medicine_id}/{pharmacy_id}', [AttachMedicinePharmacyController::class , 'index']);
});
});

Route::group([

    'middleware' => 'api', 
    'prefix' => 'order'

], function ($router) { 

    Route::group(['middleware' => ['Is_Admin']],function () {

    Route::post('create/{medicine_id}/{pharmacy_id}', [MakeOrderController::class , 'index']);
    Route::delete('delete/{order_id}', [CancelOrderController::class , 'index']);
    Route::get('show/{order_id}', [PrintOrderController::class , 'index']);
});

Route::group(['middleware' => ['Is_Owner']],function () {

    Route::get('showAll', [ShowAllOrdersController::class , 'index']);
    Route::get('showOrdersinthisDay', [OrdersinThisDayController::class , 'index']);
    Route::get('showOrdersinthisWeek', [OrdersinThisWeekController::class , 'index']);
});
});

Route::group([

    'middleware' => 'api', 
    'prefix' => 'pharmacy' 

], function ($router) {  

    Route::group(['middleware' => ['Is_Owner']],function () {

    Route::post('create', [CreatePharmacyController::class , 'index']); 
    Route::post('edit/{pharmacy_id}', [EditPharmacyController::class , 'index']);
    Route::delete('delete/{pharmacy_id}', [DeletePharmacyController::class , 'index']);
    Route::get('showAll', [ShowAllPharmaciesController::class , 'index']);
    Route::get('show/{pharmacy_id}', [ShowPharmacyController::class , 'index']);

});
});

Route::group([

    'middleware' => 'api',   
    'prefix' => 'user'

], function ($router) {  

    Route::group(['middleware' => ['Is_Admin']],function () {

    Route::get('viewMyProfile', [ViewMyProfileController::class , 'index']); 
    Route::delete('deleteMyProfile', [DeleteMyProfileController::class , 'index']);
});

Route::group(['middleware' => ['Is_Owner']],function () {

    Route::post('editMyProfile', [EditMyProfileController::class , 'index']);
    Route::get('viewUsers', [ViewUsersController::class , 'index']); 
    Route::delete('delete/{user_id}', [DeleteUserController::class , 'index']);
    Route::post('edit/{user_id}', [EditUserController::class , 'index']);
    Route::post('MakeOwner/{user_id}', [MakeOwnerController::class , 'index']);
});  
});

Route::group([

    'middleware' => 'api',   
    'prefix' => 'statistics'

], function ($router) {  

    Route::group(['middleware' => ['Is_Owner']],function () {

    Route::get('CountOrderPriceInDay/{pharmacy_id}', [TotalOrderPriceInThisDayController::class , 'index']); 
    Route::get('CountOrderPriceInMonth/{pharmacy_id}', [TotalOrderPriceInThisMonthController::class , 'index']);
});
});





