<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/cari', [CareerController::class, 'cari']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
});
