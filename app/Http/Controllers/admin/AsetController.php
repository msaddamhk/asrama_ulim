<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Kamar;
use App\Models\KategoriAset;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    public function index(Request $request, Kamar $kamar)
    {
        $aset = $kamar->aset()
            ->latest()
            ->where('nama', 'like', '%' . request('cari') . '%')
            ->paginate(15);

        return view('admin.aset.index', compact('aset', 'kamar'));
    }

    public function create(Request $request, Kamar $kamar)
    {
        $kategori_aset = KategoriAset::all();
        return view('admin.aset.create', compact('kamar', 'kategori_aset'));
    }

    public function store(Request $request, Kamar $kamar)
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

        $code = $kamar->no_kamar . '-' . mt_rand(0000, 9999);

        Aset::create([
            'no_aset' => $code,
            'id_kamar' => $kamar->id,
            'kategori_aset_id' => $request->kategori_aset,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'merek' => $request->merek,
            'jumlah' => $request->jumlah,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'foto' => $request->foto ? $request->foto->hashName() : null,
        ]);

        return redirect()->route('kamar.aset.index', $kamar)->with('success', 'Data Berhasi di Tambah');
    }

    public function edit(Request $request, Kamar $kamar, Aset $aset)
    {
        $kategori_aset = KategoriAset::all();
        return view('admin.aset.edit', compact('kamar', 'aset', 'kategori_aset'));
    }

    public function update(Request $request, Kamar $kamar, Aset $aset)
    {
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
        $aset->save();

        return redirect()->route('kamar.aset.index', $kamar)->with('success', 'Data Berhasi di Update');
    }

    public function destroy(Request $request, Kamar $kamar, Aset $aset)
    {
        Storage::delete('public/aset/' . $aset->foto);
        $aset->delete();
        return redirect()->route('kamar.aset.index', $kamar)->with('success', 'Data Berhasi di Hapus');
    }

    public function pdf(Aset $kelola_aset)
    {
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.pdf.pdf', ['data' => $kelola_aset]));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream();
    }
}
