<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->where('judul', 'like', '%' . request('cari') . '%')->paginate(15);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_berita = KategoriBerita::all();
        return view('admin.berita.create', compact('kategori_berita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori_berita' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->foto?->store('public/berita');

        Berita::create([
            'kategori_berita_id' => $request->kategori_berita,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto ? $request->foto->hashName() : null,
        ]);

        return redirect()->route('kelola-berita.index')->with('success', 'Data Berhasi di Tambah');
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
    public function edit(Berita $kelola_beritum)
    {
        $berita  = $kelola_beritum;
        $kategori_berita = KategoriBerita::all();
        return view('admin.berita.edit', compact('kategori_berita', 'berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $kelola_beritum)
    {
        $berita  = $kelola_beritum;

        $request->validate([
            'judul' => 'required|max:255',
            'kategori_berita' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('public/berita/' . $berita->foto);
            $request->foto->store('public/berita');
            $berita->foto = $request->foto->hashName();
        }

        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->kategori_berita_id = $request->kategori_berita;
        $berita->save();

        return redirect()->route('kelola-berita.index')->with('success', 'Data Berhasi di Tambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $kelola_beritum)
    {
        $berita  = $kelola_beritum;
        Storage::delete('public/berita/' . $berita->foto);
        $berita->delete();
        return redirect()->route('kelola-berita.index')->with('success', 'Data Berhasi di hapus');
    }
}
