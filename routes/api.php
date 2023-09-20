<?php

use App\Http\Controllers\Authenticate\UserLoginController;
use App\Http\Controllers\Authenticate\UserRegisterController;
use App\Http\Controllers\Budget\BudgetServiceController;
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
        Route::post('update', [BudgetServiceController::class, 'update']);
        Route::get('/{idBudget}', [BudgetServiceController::class, 'getById']);
        Route::delete('', [BudgetServiceController::class, 'delete']);
    });

    Route::group(['prefix' => 'problem'], function() {
        Route::get('', [ProblemServiceController::class, 'getAvaliableProblems']);
    });
});