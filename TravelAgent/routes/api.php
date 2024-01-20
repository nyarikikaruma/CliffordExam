<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

// Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/{id}', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('contract')->group(function() {
        Route::get('/', [ContractController::class, 'index']);
        Route::get('/{id}', [ContractController::class, 'show']);
        Route::post('/', [ContractController::class, 'store']);
        Route::put('/{id}', [ContractController::class, 'update']);
        Route::delete('/{id}', [ContractController::class, 'destroy']);
    });

    Route::prefix('accommodation')->group(function() {
        Route::get('/', [AccommodationController::class, 'index']);
        Route::get('/{id}', [AccommodationController::class, 'show']);
        Route::post('/{id}', [AccommodationController::class, 'store']);
        Route::put('/{id}', [AccommodationController::class, 'update']);
        Route::delete('/{id}', [AccommodationController::class, 'destroy']);
    });
// });
