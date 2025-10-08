<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kategori_aset;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});

Route::get('/kategori', [Kategori_aset::class, 'kategori'])
->name('kategori');

Route::GET('/auth', [AuthController::class, 'index']);

Route::POST('/auth/login', [AuthController::class, 'login'])
->name('auth.login');
