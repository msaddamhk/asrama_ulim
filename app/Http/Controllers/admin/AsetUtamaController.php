<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Kamar;
use App\Models\KategoriAset;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetUtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = Aset::latest()
            ->where('no_aset', 'like', '%' . request('cari') . '%')
            ->paginate(15);

        return view('admin.aset_utama.index', compact('aset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kamar = Kamar::all();
        $kategori_aset = KategoriAset::all();

        return view('admin.aset_utama.create', compact('kamar', 'kategori_aset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'kondisi' => 'required|max:255',
            'merek' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'tanggal_pembelian' => 'required|max:255',
            'kategori_aset' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request->foto?->store('public/aset');

        $kamar = Kamar::where('id', $request->kamar)->first();

        $code = $kamar->no_kamar . '-' . mt_rand(0000, 9999);

        Aset::create([
            'no_aset' => $code,
            'id_kamar' => $request->kamar,
            'kategori_aset_id' => $request->kategori_aset,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'merek' => $request->merek,
            'jumlah' => $request->jumlah,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'foto' => $request->foto ? $request->foto->hashName() : null,
        ]);

        return redirect()->route('kelola-aset.index')->with('success', 'Data Berhasi di Tambah');
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
    public function edit(Aset $kelola_aset)
    {
        $aset = $kelola_aset;
        $kategori_aset = KategoriAset::all();
        $kamar = Kamar::all();

        return view('admin.aset_utama.edit', compact('kamar', 'aset', 'kategori_aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Aset $kelola_aset)
    {
        $aset = $kelola_aset;

        $request->validate([
            'nama' => 'required|max:255',
            'kategori_aset' => 'required|max:255',
            'kondisi' => 'required|max:255',
            'merek' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'tanggal_pembelian' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('public/aset/' . $aset->foto);
            $request->foto->store('public/aset');
            $aset->foto = $request->foto->hashName();
        }

        $aset->nama = $request->nama;
        $aset->kondisi = $request->kondisi;
        $aset->tanggal_pembelian = $request->tanggal_pembelian;
        $aset->jumlah = $request->jumlah;
        $aset->merek = $request->merek;
        $aset->kategori_aset_id = $request->kategori_aset;
        $aset->id_kamar = $request->kamar;
        $aset->save();

        return redirect()->route('kelola-aset.index')->with('success', 'Data Berhasi di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $kelola_aset)
    {
        $aset = $kelola_aset;

        Storage::delete('public/aset/' . $aset->foto);
        $aset->delete();

        return redirect()->route('kelola-aset.index')->with('success', 'Data Berhasi di Hapus');
    }
}
