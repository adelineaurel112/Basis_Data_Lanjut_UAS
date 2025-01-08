<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategori = Kategori::all();  // Mengambil semua data kategori
        return view('kategori.index', compact('kategori'));  // Mengirim data ke view kategori.index
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:200',
            'Aktif' => 'required|in:Y,N',
        ]);

        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.create', compact('kategori'));
    }

    // Menyimpan update kategori
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:200',
            'Aktif' => 'required|in:Y,N',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
