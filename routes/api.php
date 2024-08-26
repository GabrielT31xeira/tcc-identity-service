<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('verify-token', [\App\Http\Controllers\api\TokenVerifyController::class, 'normalToken']);
    Route::get('verify-token-admin', [\App\Http\Controllers\api\TokenVerifyController::class, 'adminToken']);
});
