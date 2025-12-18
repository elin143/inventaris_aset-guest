<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\MutasiAset;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function index()
    {
        $mutasi = MutasiAset::with('aset')->paginate(12);
        return view('pages.mutasi_aset.index', compact('mutasi'));
    }

    // Form tambah
    public function create()
    {
        $aset = Aset::all();
        return view('pages.mutasi_aset.create', compact('aset'));
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'aset_id'      => 'required',
            'tanggal'      => 'required|date',
            'jenis_mutasi' => 'required',
            'keterangan'   => 'nullable',
        ]);

        MutasiAset::create($request->all());

        return redirect()->route('mutasi-aset.index')
            ->with('success', 'Data mutasi aset berhasil ditambahkan');
    }

    // Detail
    public function show($id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        return view('mutasi_aset.show', compact('mutasi'));
    }

    // Form edit
    public function edit($id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        $aset   = Aset::all();
        return view('pages.mutasi_aset.edit', compact('mutasi', 'aset'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $mutasi = MutasiAset::findOrFail($id);

        $request->validate([
            'aset_id'      => 'required',
            'tanggal'      => 'required|date',
            'jenis_mutasi' => 'required',
            'keterangan'   => 'nullable',
        ]);

        $mutasi->update([
            'aset_id'      => $request->aset_id,
            'tanggal'      => $request->tanggal,
            'jenis_mutasi' => $request->jenis_mutasi,
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('mutasi-aset.index')
            ->with('success', 'Data mutasi aset berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        MutasiAset::destroy($id);

        return redirect()->route('mutasi-aset.index')
            ->with('success', 'Data mutasi aset berhasil dihapus');
    }
}
