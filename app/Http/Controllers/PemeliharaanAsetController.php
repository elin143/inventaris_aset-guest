<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\PemeliharaanAset;
use Illuminate\Http\Request;

class PemeliharaanAsetController extends Controller
{
public function index(Request $request)
{
    $search = $request->search;

    // Subquery pemeliharaan
    $sub = \DB::table('pemeliharaan_aset as pa')
        ->selectRaw('
            pa.aset_id,
            SUM(pa.biaya) AS total_biaya,
            COUNT(pa.pemeliharaan_id) AS total_riwayat,
            (
                SELECT pa2.pemeliharaan_id
                FROM pemeliharaan_aset pa2
                WHERE pa2.aset_id = pa.aset_id
                ORDER BY pa2.tanggal DESC
                LIMIT 1
            ) AS latest_id
        ')
        ->groupBy('pa.aset_id');

    // Query utama — langsung DB::table() agar semua kolom terbaca
$data = \DB::table('aset')
    ->leftJoinSub($sub, 'p', function ($join) {
        $join->on('p.aset_id', '=', 'aset.aset_id');
    })
    ->select(
        'aset.aset_id',
        'aset.nama_aset',
        'p.total_biaya',
        'p.total_riwayat',
        'p.latest_id'
    )
    ->whereNotNull('p.latest_id') // ⬅ penting!
    ->paginate(9)
    ->withQueryString();

    return view('pages.pemeliharaan.index', compact('data'));
}

    public function create()
    {
        $aset = Aset::all();
        return view('pages.pemeliharaan.create', compact('aset'));
    }

    public function show($id)
    {
        $pemeliharaan = PemeliharaanAset::with('media', 'aset')->findOrFail($id);

        $riwayat = PemeliharaanAset::with('media')
            ->where('aset_id', $pemeliharaan->aset_id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pages.pemeliharaan.detail', [
            'pemeliharaan' => $pemeliharaan,
            'riwayat'      => $riwayat,
        ]);
    }

    public function edit($id)
    {
        $pemeliharaan = PemeliharaanAset::with('media', 'aset')->findOrFail($id);
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

        $pemeliharaan = PemeliharaanAset::create($request->only(
            'aset_id', 'tanggal', 'tindakan', 'biaya', 'pelaksana'
        ));

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

    public function destroy($id)
    {
        PemeliharaanAset::findOrFail($id)->delete();

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
