<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kategori_aset extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function kategori()
{
    $data['kategori'] = [
        [
            'kode' => '🚗 KD01',
            'nama' => 'Kendaraan',
            'deskripsi' => 'Mobil, motor, dan kendaraan operasional lainnya',
        ],
        [
            'kode' => '💻 EL02',
            'nama' => 'Elektronik',
            'deskripsi' => 'Laptop, komputer, proyektor, dan perangkat elektronik lainnya',
        ],
        [
            'kode' => '🏠 GD03',
            'nama' => 'Gedung',
            'deskripsi' => 'Bangunan kantor, ruang kuliah, dan fasilitas lainnya',
        ],
        [
            'kode' => '📚 BK04',
            'nama' => 'Buku',
            'deskripsi' => 'Buku referensi, modul, dan literatur lainnya',
        ],
        [
            'kode' => '🛠️ AT05',
            'nama' => 'Alat',
            'deskripsi' => 'Peralatan kerja, laboratorium, dan perlengkapan operasional',
        ],
    ];

    return view('Kategori', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
