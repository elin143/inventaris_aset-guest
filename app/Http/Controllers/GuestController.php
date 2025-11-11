<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Menampilkan halaman tentang
    public function tentang()
    {
        return view('pages.guest.about');
    }
}
