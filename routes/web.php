<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Kategori_inventarisController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\PemeliharaanAsetController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.register');
});

Route::GET('/auth', [AuthController::class, 'index']);

Route::POST('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/developer', [DashboardController::class, 'developer'])->name('developer');

Route::get('/kategori', [Kategori_inventarisController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [Kategori_inventarisController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [Kategori_inventarisController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [Kategori_inventarisController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori_id}', [Kategori_inventarisController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [Kategori_inventarisController::class, 'destroy'])->name('kategori.destroy');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tentang', [GuestController::class, 'tentang'])->name('tentang');

Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');
Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
Route::post('/aset/store', [AsetController::class, 'store'])->name('aset.store');
Route::get('/aset/{id}/edit', [AsetController::class, 'edit'])->name('aset.edit');
Route::put('/aset/{id}/update', [AsetController::class, 'update'])->name('aset.update');
Route::delete('/aset/{id}/delete', [AsetController::class, 'destroy'])->name('aset.destroy');

Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{id}/update', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{id}/delete', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/kategori', [Kategori_inventarisController::class, 'index'])
        ->name('kategori.index');
    Route::get('/warga', [WargaController::class, 'index'])
        ->name('warga.index');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::prefix('mutasi-aset')->middleware(['auth'])->group(function () {
    Route::get('/', [MutasiAsetController::class, 'index'])->name('mutasi-aset.index');
    Route::get('/create', [MutasiAsetController::class, 'create'])->name('mutasi-aset.create');
    Route::post('/store', [MutasiAsetController::class, 'store'])->name('mutasi-aset.store');
    Route::get('/{id}', [MutasiAsetController::class, 'show'])->name('mutasi-aset.show');
    Route::get('/{id}/edit', [MutasiAsetController::class, 'edit'])->name('mutasi-aset.edit');
    Route::put('/{id}', [MutasiAsetController::class, 'update'])->name('mutasi-aset.update');
    Route::delete('/{id}', [MutasiAsetController::class, 'destroy'])->name('mutasi-aset.destroy');
});

Route::get('/pemeliharaan-aset', [PemeliharaanAsetController::class, 'index'])
    ->name('pemeliharaan.index');
Route::get('/pemeliharaan-aset/create', [PemeliharaanAsetController::class, 'create'])
    ->name('pemeliharaan.create');
Route::post('/pemeliharaan-aset', [PemeliharaanAsetController::class, 'store'])
    ->name('pemeliharaan.store');
Route::get('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'show'])
    ->name('pemeliharaan.detail');
Route::get('/pemeliharaan-aset/{id}/edit', [PemeliharaanAsetController::class, 'edit'])
    ->name('pemeliharaan.edit');
Route::put('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'update'])
    ->name('pemeliharaan.update');
Route::delete('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'destroy'])
    ->name('pemeliharaan.destroy');

    Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

        // TENTANG
    Route::get('/tentang', [GuestController::class, 'tentang'])
        ->name('tentang');

    // IDENTITAS PENGEMBANG
    Route::get('/developer', [DashboardController::class, 'developer'])
        ->name('developer');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

    // ================= KATEGORI =================
    Route::get('/kategori/create', [Kategori_inventarisController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [Kategori_inventarisController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [Kategori_inventarisController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori_id}', [Kategori_inventarisController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [Kategori_inventarisController::class, 'destroy'])->name('kategori.destroy');

    // ================= ASET =================
    Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
    Route::post('/aset/store', [AsetController::class, 'store'])->name('aset.store');
    Route::get('/aset/{id}/edit', [AsetController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{id}/update', [AsetController::class, 'update'])->name('aset.update');
    Route::delete('/aset/{id}/delete', [AsetController::class, 'destroy'])->name('aset.destroy');

    // ================= LOKASI =================
    Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::put('/lokasi/{id}/update', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('/lokasi/{id}/delete', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

    // ================= MUTASI ASET =================
    Route::prefix('mutasi-aset')->group(function () {
        Route::get('/create', [MutasiAsetController::class, 'create'])->name('mutasi-aset.create');
        Route::post('/store', [MutasiAsetController::class, 'store'])->name('mutasi-aset.store');
        Route::get('/{id}', [MutasiAsetController::class, 'show'])->name('mutasi-aset.show');
        Route::get('/{id}/edit', [MutasiAsetController::class, 'edit'])->name('mutasi-aset.edit');
        Route::put('/{id}', [MutasiAsetController::class, 'update'])->name('mutasi-aset.update');
        Route::delete('/{id}', [MutasiAsetController::class, 'destroy'])->name('mutasi-aset.destroy');
    });

    // ================= PEMELIHARAAN =================
    Route::get('/pemeliharaan-aset/create', [PemeliharaanAsetController::class, 'create'])->name('pemeliharaan.create');
    Route::post('/pemeliharaan-aset', [PemeliharaanAsetController::class, 'store'])->name('pemeliharaan.store');
    Route::get('/pemeliharaan-aset/{id}/edit', [PemeliharaanAsetController::class, 'edit'])->name('pemeliharaan.edit');
    Route::put('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'update'])->name('pemeliharaan.update');
    Route::delete('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'destroy'])->name('pemeliharaan.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/kategori', [Kategori_inventarisController::class, 'index'])
        ->name('kategori.index');

    Route::get('/aset', [AsetController::class, 'index'])
        ->name('aset.index');

    Route::get('/lokasi', [LokasiController::class, 'index'])
        ->name('lokasi.index');

    Route::get('/mutasi-aset', [MutasiAsetController::class, 'index'])
        ->name('mutasi-aset.index');

    Route::get('/pemeliharaan-aset', [PemeliharaanAsetController::class, 'index'])
        ->name('pemeliharaan.index');
        Route::get('/pemeliharaan-aset/{id}', [PemeliharaanAsetController::class, 'show'])->name('pemeliharaan.detail');
});



