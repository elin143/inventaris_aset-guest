<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\PemeliharaanAset;
use Illuminate\Http\Request;

class PemeliharaanAsetController extends Controller
{
    public function index()
    {
        $data = PemeliharaanAset::with('aset')
            ->select('pemeliharaan_id', 'aset_id')
            ->selectRaw('SUM(biaya) as total_biaya')
            ->groupBy('pemeliharaan_id', 'aset_id')
            ->get();


        return view('pages.pemeliharaan.index', compact('data'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('pages.pemeliharaan.create', compact('aset'));
    }
    public function show($id)
    {
        $pemeliharaan = PemeliharaanAset::with('media', 'aset')
            ->where('pemeliharaan_id', $id)
            ->firstOrFail();

        return view('pages.pemeliharaan.detail', compact('pemeliharaan'));
    }

// EDIT
    public function edit($id)
    {
        $pemeliharaan = PemeliharaanAset::with('media', 'aset')
            ->findOrFail($id);

        return view('pages.pemeliharaan.edit', compact('pemeliharaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id'   => 'required|exists:aset,aset_id',
            'tanggal'   => 'required|date',
            'tindakan'  => 'required',
            'biaya'     => 'required|numeric',
            'pelaksana' => 'required',
        ]);

        $pemeliharaan = PemeliharaanAset::create([
            'aset_id'   => $request->aset_id,
            'tanggal'   => $request->tanggal,
            'tindakan'  => $request->tindakan,
            'biaya'     => $request->biaya,
            'pelaksana' => $request->pelaksana,
        ]);

        // Simpan bukti pemeliharaan (media)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('pemeliharaan_aset', 'public');

                $pemeliharaan->media()->create([
                    'ref_table' => 'pemeliharaan_aset',
                    'ref_id'    => $pemeliharaan->pemeliharaan_id,
                    'file_url'  => $path,
                    'mime_type' => $file->getClientMimeType(),
                ]);

            }
        }

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Data pemeliharaan berhasil ditambahkan');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal'   => 'required|date',
            'tindakan'  => 'required',
            'biaya'     => 'required|numeric',
            'pelaksana' => 'required',
        ]);

        $pemeliharaan = PemeliharaanAset::findOrFail($id);
        $pemeliharaan->update($request->all());

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    // HAPUS
    public function destroy($id)
    {
        PemeliharaanAset::findOrFail($id)->delete();

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
