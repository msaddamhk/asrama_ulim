<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->paginate(15);
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->foto?->store('public/galeri');

        Galeri::create([
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto ? $request->foto->hashName() : null,
        ]);

        return redirect()->route('kelola-galeri.index')->with('success', 'galeri berhasil di tambahkan.');
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
    public function edit(Galeri $kelola_galeri)
    {
        $galeri = $kelola_galeri;
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $kelola_galeri)
    {
        $galeri = $kelola_galeri;

        $request->validate([
            'deskripsi' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('public/galeri/' . $galeri->foto);
            $request->foto->store('public/galeri');
            $galeri->foto = $request->foto->hashName();
        }

        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();
        return redirect()->route('kelola-galeri.index')->with('success', 'galeri berhasil di Update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $kelola_galeri)
    {
        $galeri = $kelola_galeri;

        Storage::delete('public/galeri/' . $galeri->foto);
        $galeri->delete();
        return redirect()->route('kelola-galeri.index')->with('success', 'galeri berhasil di hapus.');
    }
}
