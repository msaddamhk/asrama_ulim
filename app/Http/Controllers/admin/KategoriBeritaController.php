<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_berita = KategoriBerita::latest()->where('nama', 'like', '%' . request('cari') . '%')->paginate(15);
        return view('admin.kategori_berita.index', compact('kategori_berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        KategoriBerita::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-berita.index')->with('success', 'kategori berhasil di tambahkan.');
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
    public function edit(KategoriBerita $kategori_beritum)
    {
        return view('admin.kategori_berita.edit', compact('kategori_beritum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategori_beritum)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $kategori_beritum->nama = $request->nama;

        $kategori_beritum->save();

        return redirect()->route('kategori-berita.index')->with('success', 'kategori berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBerita $kategori_beritum)
    {
        $kategori_beritum->delete();
        return redirect()->route('kategori-berita.index')->with('success', 'kategori berhasil di update.');
    }
}
