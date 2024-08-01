<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* Route::middleware(['auth:sanctum', 'role:0'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    // Other admin routes
});

Route::middleware(['auth:sanctum', 'role:1'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    // Other user routes
}); */