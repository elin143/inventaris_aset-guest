<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'kode_aset' => 'required|unique:aset',
        'nama_aset' => 'required',
        'files.*' => 'file|mimes:jpg,png,jpeg,pdf|max:2048'
    ]);

    // Simpan data aset dulu
    $aset = Aset::create($request->all());

    // Kalau ada file
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $index => $file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('uploads/aset', $filename);

            Media::create([
                'ref_table' => 'aset',
                'ref_id' => $aset->id,
                'file_name' => $filename,
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => $index + 1
            ]);
        }
    }

    return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
}
}
