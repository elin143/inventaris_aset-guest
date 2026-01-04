<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Lokasi;
use App\Models\Media;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // INDEX
    public function index(Request $request)
    {
        $searchableColumns = ['keterangan', 'lokasi_text', 'rt', 'rw']; // kolom lokasi

        $lokasi = Lokasi::with(['aset', 'media'])
            ->search($request, $searchableColumns)
            ->paginate(12)
            ->withQueryString();

        return view('pages.lokasi.index', compact('lokasi'));
    }

    // CREATE
    public function create()
    {
        $aset = Aset::all();
        return view('pages.lokasi.create', compact('aset'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'media.*' => 'nullable|image|max:2048',
        ]);

        $lokasi = Lokasi::create([
            'aset_id'     => $request->aset_id,
            'keterangan'  => $request->keterangan,
            'lokasi_text' => $request->lokasi_text,
            'rt'          => $request->rt,
            'rw'          => $request->rw,
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('lokasi_aset', 'public');

                Media::create([
                    'ref_table' => 'lokasi_aset',
                    'ref_id'    => $lokasi->lokasi_id,
                    'file_url'  => $path,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil disimpan');
    }

    // EDIT
    public function edit($id)
    {
        $lokasi = Lokasi::with('media')->findOrFail($id);
        $aset   = Aset::all();

        return view('pages.lokasi.edit', compact('lokasi', 'aset'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'media.*' => 'nullable|image|max:2048',
        ]);

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->update([
            'aset_id'     => $request->aset_id,
            'keterangan'  => $request->keterangan,
            'lokasi_text' => $request->lokasi_text,
            'rt'          => $request->rt,
            'rw'          => $request->rw,
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('lokasi_aset', 'public');

                Media::create([
                    'ref_table' => 'lokasi_aset',
                    'ref_id'    => $lokasi->lokasi_id,
                    'file_url'  => $path,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil diperbarui');
    }

    // DELETE
    public function destroy($id)
    {
        $lokasi = Lokasi::with('media')->findOrFail($id);

        foreach ($lokasi->media as $media) {
            $path = storage_path('app/public/' . $media->file_url);
            if (file_exists($path)) {
                unlink($path);
            }

            $media->delete();
        }

        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil dihapus');
    }
}
