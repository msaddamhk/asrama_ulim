<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_aset = KategoriAset::latest()->where('nama', 'like', '%' . request('cari') . '%')->paginate(15);
        return view('admin.kategori_aset.index', compact('kategori_aset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        KategoriAset::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-aset.index')->with('success', 'kategori berhasil di tambahkan.');
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
    public function edit(KategoriAset $kategori_aset)
    {
        return view('admin.kategori_aset.edit', compact('kategori_aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriAset $kategori_aset)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $kategori_aset->nama = $request->nama;

        $kategori_aset->save();

        return redirect()->route('kategori-aset.index')->with('success', 'kategori berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriAset $kategori_aset)
    {
        $kategori_aset->delete();
        return redirect()->route('kategori-aset.index')->with('success', 'kategori berhasil di hapus.');
    }
}
