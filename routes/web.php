<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kategori_inventarisController;

Route::get('/', function () {
    return view('pages.guest.dashboard');
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

Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');

Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');

Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');

Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');

Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');

Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

Route::get('/login', [UserController::class, 'index'])->name('login');

// Proses login
Route::post('/login', [UserController::class, 'login'])->name('login.process');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.process');
// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/tentang', [GuestController::class, 'tentang'])->name('tentang');

// INDEX
Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');

// TAMPIL FORM CREATE
Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');

// SIMPAN DATA
Route::post('/aset/store', [AsetController::class, 'store'])->name('aset.store');

// EDIT
Route::get('/aset/{id}/edit', [AsetController::class, 'edit'])->name('aset.edit');

// UPDATE
Route::put('/aset/{id}/update', [AsetController::class, 'update'])->name('aset.update');

// DELETE
Route::delete('/aset/{id}/delete', [AsetController::class, 'destroy'])->name('aset.destroy');
