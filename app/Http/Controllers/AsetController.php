<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Media;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['kondisi'];
        $searchableColumns = ['nama_aset', 'kode_aset'];

        $aset = Aset::with('media', 'kategori')
            ->filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(12)
            ->withQueryString();

        return view('pages.aset.index', compact('aset'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.aset.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'kategori_id'     => 'required',
            'kode_aset'       => 'required|unique:aset,kode_aset',
            'nama_aset'       => 'required',
            'tgl_perolehan'   => 'required',
            'nilai_perolehan' => 'required|numeric',
            'kondisi'         => 'required',
            'media.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // SIMPAN DATA ASET
        $aset = Aset::create([
            'kategori_id'     => $request->kategori_id,
            'kode_aset'       => $request->kode_aset,
            'nama_aset'       => $request->nama_aset,
            'tgl_perolehan'   => $request->tgl_perolehan,
            'nilai_perolehan' => $request->nilai_perolehan,
            'kondisi'         => $request->kondisi,
        ]);

        // JIKA ADA FILE MEDIA → SIMPAN KE STORAGE & DB
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                // simpan ke storage/app/public/media
                $file_url = time() . '_' . $file->getClientOriginalName();
                $path     = 'media/' . $file_url;

                // storeAs ke folder "public/media"
                $file->move(public_path('storage/media'), $file_url);

                // simpan ke tabel media
                Media::create([
                    'ref_table'  => 'aset',
                    'ref_id'     => $aset->aset_id,
                    'file_url'   => $path, // <-- simpan path lengkap!
                    'mime_type'  => $file->getClientMimeType(),
                    'caption'    => null,
                    'sort_order' => 1,
                ]);
            }
        }

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
    }

public function update(Request $request, $id)
{
    $request->validate([
        'kategori_id'     => 'required',
        'kode_aset'       => "required|unique:aset,kode_aset,$id,aset_id",
        'nama_aset'       => 'required',
        'tgl_perolehan'   => 'required',
        'nilai_perolehan' => 'required|numeric',
        'kondisi'         => 'required',
        'media.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $aset = Aset::with('media')->findOrFail($id);

    // UPDATE DATA
    $aset->update([
        'kategori_id'     => $request->kategori_id,
        'kode_aset'       => $request->kode_aset,
        'nama_aset'       => $request->nama_aset,
        'tgl_perolehan'   => $request->tgl_perolehan,
        'nilai_perolehan' => $request->nilai_perolehan,
        'kondisi'         => $request->kondisi,
    ]);

    // UPDATE FOTO
    if ($request->hasFile('media')) {

        // Hapus media lama
        foreach ($aset->media as $media) {

            $oldPath = public_path('storage/' . $media->file_url);
            if (file_exists($oldPath)) unlink($oldPath);

            $media->delete();
        }

        // Upload file baru
        foreach ($request->file('media') as $file) {

            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'media/' . $filename;

            $file->move(public_path('storage/media'), $filename);

            Media::create([
                'ref_table'  => 'aset',
                'ref_id'     => $aset->aset_id,
                'file_url'   => $path,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }
    }

    return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui');
}




public function destroy($id)
{
    Aset::findOrFail($id)->delete();
    return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus');
}

public function edit($id)
{
    $aset     = Aset::findOrFail($id);
    $kategori = Kategori::all();
    return view('pages.aset.edit', compact('aset', 'kategori'));
}
};
