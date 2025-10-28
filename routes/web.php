<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kategori_inventarisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::GET('/auth', [AuthController::class, 'index']);

Route::POST('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/kategori', [Kategori_inventarisController::class, 'index'])->name('kategori.index');

Route::get('/kategori/create', [Kategori_inventarisController::class, 'create'])->name('kategori.create');

Route::post('/kategori', [Kategori_inventarisController::class, 'store'])->name('kategori.store');

Route::get('/kategori/{id}/edit', [Kategori_inventarisController::class, 'edit'])->name('kategori.edit');

Route::put('/kategori/{kategori_id}', [Kategori_inventarisController::class, 'update'])->name('kategori.update');

Route::delete('/kategori/{id}', [Kategori_inventarisController::class, 'destroy'])->name('kategori.destroy');

