<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::latest()->where('no_kamar', 'like', '%' . request('cari') . '%')->paginate(15);
        return view('admin.kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required|max:255',
            'status' => 'required|max:255',
            'lantai' => 'required|max:255',
            'luas_kamar' => 'required|max:255',
            'kapasitas' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->foto?->store('public/kamar');

        Kamar::create([
            'no_kamar' => $request->no_kamar,
            'status' => $request->status,
            'kapasitas' => $request->kapasitas,
            'lantai' => $request->lantai,
            'luas_kamar' => $request->luas_kamar,
            'foto' => $request->foto ? $request->foto->hashName() : null,
        ]);

        return redirect()->route('kelola-ruang.index')->with('success', 'kamar berhasil di tambahkan.');
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
    public function edit(Kamar $kelola_ruang)
    {
        $kamar = $kelola_ruang;
        return view('admin.kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kelola_ruang)
    {

        $kamar = $kelola_ruang;

        $request->validate([
            'no_kamar' => 'required|max:255',
            'status' => 'required|max:255',
            'lantai' => 'required|max:255',
            'luas_kamar' => 'required|max:255',
            'kapasitas' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('public/kamar/' . $kamar->foto);
            $request->foto->store('public/kamar');
            $kamar->foto = $request->foto->hashName();
        }

        $kamar->no_kamar = $request->no_kamar;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->lantai = $request->lantai;
        $kamar->luas_kamar = $request->luas_kamar;
        $kamar->save();

        return redirect()->route('kelola-ruang.index')->with('success', 'kamar berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kelola_ruang)
    {
        $kamar = $kelola_ruang;

        Storage::delete('public/kamar/' . $kamar->foto);
        $kamar->delete();
        return redirect()->route('kelola-ruang.index')->with('success', 'kamar berhasil di hapus');
    }
}
