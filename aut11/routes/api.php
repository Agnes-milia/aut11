<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMW;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//autentikált végpontok
Route::middleware(['auth:sanctum')->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
    // Kijelentkezés útvonal
    Route::post('/logout', [AuthController::class, 'logout']);
});

//admin végpontok
Route::middleware(['auth:sanctum', AdminMW::class])->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
});

//bárki által hozzáférhető útvonal
Route::post('/login', [AuthController::class, 'login'])->name('login');


