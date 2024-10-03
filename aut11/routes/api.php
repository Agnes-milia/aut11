<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMW;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//autentikált végpontok
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Kijelentkezés útvonal
    Route::post('/logout', [AuthController::class, 'logout']);
});

//admin végpontok
Route::middleware(['auth:sanctum', AdminMW::class])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
});

//bárki által hozzáférhető útvonal
//Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
