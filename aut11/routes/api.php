<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMW;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum', AdminMW::class])->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');