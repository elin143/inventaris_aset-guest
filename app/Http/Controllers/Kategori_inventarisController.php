<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class Kategori_inventarisController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('guest.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('guest.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kode'      => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($validated);

        return redirect()
            ->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('guest.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $kategori_id)
    {

        $kategori = Kategori::findOrFail($kategori_id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kode'      => 'required|string|max:255|unique:kategori_aset,kode,' . $kategori_id . ',kategori_id',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($validated);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
