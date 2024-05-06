<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix' => 'auth'], function () {
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth:api')->group(function(){
    // Group prefix auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::get('user-profile', [AuthController::class, 'userProfile'])->name('user-profile');
    });
    
    // Group prefix admin
    Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::post('users/name', [UserController::class, 'showByName'])->name('users.showByName');
        Route::post('users/email', [UserController::class, 'showByEmail'])->name('users.showByEmail');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::group(['prefix' => 'preprocessing'], function () {
        Route::post('', [PreProcessingController::class, 'store'])->name('preprocessing.store');
    });
});

