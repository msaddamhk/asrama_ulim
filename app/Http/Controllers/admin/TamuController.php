<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamu = Tamu::latest()->where('nama', 'like', '%' . request('cari') . '%')->paginate(15);
        return view('admin.tamu.index', compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_masuk' => 'required|max:255',
            'tanggal_keluar' => 'required|max:255',
            'keperluan' => 'required|max:255',
        ]);

        Tamu::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('tamu.index')->with('success', 'Data berhasil di tambahkan.');
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
    public function edit(Tamu $tamu)
    {
        return view('admin.tamu.edit', compact('tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tamu $tamu)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_masuk' => 'required|max:255',
            'tanggal_keluar' => 'required|max:255',
            'keperluan' => 'required|max:255',
        ]);

        $tamu->nama = $request->nama;
        $tamu->no_hp = $request->no_hp;
        $tamu->jenis_kelamin = $request->jenis_kelamin;
        $tamu->alamat = $request->alamat;
        $tamu->tanggal_masuk = $request->tanggal_masuk;
        $tamu->tanggal_keluar = $request->tanggal_keluar;
        $tamu->keperluan = $request->keperluan;

        $tamu->save();

        return redirect()->route('tamu.index')->with('success', 'Data berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tamu $tamu)
    {
        $tamu->delete();
        return redirect()->route('tamu.index')->with('success', 'Data berhasil di update.');
    }
}
