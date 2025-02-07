<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function () {
    Route::get('', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginStore'])->name('loginStore');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
