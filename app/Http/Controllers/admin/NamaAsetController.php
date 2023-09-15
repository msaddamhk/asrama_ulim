<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAset;
use App\Models\NamaAset;
use Illuminate\Http\Request;

class NamaAsetController extends Controller
{
    public function index(Request $request, KategoriAset $kategori_aset)
    {
        $nama_aset = $kategori_aset->namaAset()
            ->latest()
            ->where('nama', 'like', '%' . request('cari') . '%')
            ->paginate(15);

        return view('admin.nama_aset.index', compact('nama_aset', 'kategori_aset'));
    }

    public function create(Request $request, KategoriAset $kategori_aset)
    {
        return view('admin.nama_aset.create', compact('kategori_aset'));
    }

    public function store(Request $request, KategoriAset $kategori_aset)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        NamaAset::create([
            'nama' => $request->nama,
            'kategori_aset_id' => $request->kategori_aset->id,
        ]);

        return redirect()->route('kategori-aset.nama-aset.index', $kategori_aset)->with('success', 'Data Berhasi di Tambah');
    }

    public function edit(Request $request, KategoriAset $kategori_aset, NamaAset $nama_aset)
    {
        return view('admin.nama_aset.edit', compact('kategori_aset', 'nama_aset'));
    }

    public function update(Request $request, KategoriAset $kategori_aset, NamaAset $nama_aset)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $nama_aset->nama = $request->nama;
        $nama_aset->save();

        return redirect()->route('kategori-aset.nama-aset.index', $kategori_aset)->with('success', 'Data Berhasil di tambah');
    }


    public function destroy(Request $request, KategoriAset $kategori_aset, NamaAset $nama_aset)
    {
        $nama_aset->delete();
        return redirect()->route('kategori-aset.nama-aset.index', $kategori_aset)->with('success', 'Data Berhasil di Hapus');
    }
}
