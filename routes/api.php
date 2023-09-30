<?php

use App\Http\Controllers\Authenticate\UserLoginController;
use App\Http\Controllers\Authenticate\UserRegisterController;
use App\Http\Controllers\Budget\BudgetServiceController;
use App\Http\Controllers\CompanyProfile\CompanyProfileController;
use App\Http\Controllers\Problem\ProblemServiceController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [UserRegisterController::class, 'userRegister']);
    Route::post('login', [UserLoginController::class, 'userLogin']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'budget'], function() {
        Route::post('', [BudgetServiceController::class, 'create']);
        Route::post('update/{idBudget}', [BudgetServiceController::class, 'update']);
        Route::get('{idBudget}', [BudgetServiceController::class, 'getById']);
        Route::get('', [BudgetServiceController::class, 'getAll']);
        Route::delete('{idBudget}', [BudgetServiceController::class, 'delete']);
    });

    Route::group(['prefix' => 'problem'], function() {
        Route::get('', [ProblemServiceController::class, 'getAvaliableProblems']);
    });

    Route::group(['prefix' => 'profile'], function() {
        Route::get('', [CompanyProfileController::class, 'index']);
        Route::get('{companyId}', [CompanyProfileController::class, 'getById']);
        Route::post('', [CompanyProfileController::class, 'create']);
        Route::post('update/{companyId}', [CompanyProfileController::class, 'update']);
        Route::delete('{companyId}', [CompanyProfileController::class, 'delete']);
    });
});