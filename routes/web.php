<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kategori_aset;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', [Kategori_aset::class, 'index']);

