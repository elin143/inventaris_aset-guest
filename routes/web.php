<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kategori_aset;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', [Kategori_aset::class, 'home']);

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login'])
->name('auth.login');
