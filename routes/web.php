<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TerritoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TerritoryController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('/account/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/account/login', [LoginController::class, 'authenticate'])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
