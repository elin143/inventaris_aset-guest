<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AsetController extends Controller
{
public function index()
{
$aset = Aset::with('kategori')->get();
$kategori = Kategori::all();
return view('pages.aset.index', compact('aset','kategori'));
}


public function create()
{
$kategori = Kategori::all();
return view('pages.aset.create', compact('kategori'));
}


public function store(Request $request)
{
$request->validate([
'kategori_id' => 'required',
'kode_aset' => 'required|unique:aset',
'nama_aset' => 'required',
'tgl_perolehan' => 'required',
'nilai_perolehan' => 'required|numeric',
'kondisi' => 'required',
]);


Aset::create($request->all());
return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
}


public function edit($id)
{
$aset = Aset::findOrFail($id);
$kategori = Kategori::all();
return view('pages.aset.edit', compact('aset', 'kategori'));
}


public function update(Request $request, $id)
{
$request->validate([
'kategori_id' => 'required',
'kode_aset' => "required|unique:aset,kode_aset,$id,aset_id",
'nama_aset' => 'required',
'tgl_perolehan' => 'required',
'nilai_perolehan' => 'required|numeric',
'kondisi' => 'required',
]);


Aset::findOrFail($id)->update($request->all());
return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui');
}


public function destroy($id)
{
Aset::findOrFail($id)->delete();
return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus');
}
}
