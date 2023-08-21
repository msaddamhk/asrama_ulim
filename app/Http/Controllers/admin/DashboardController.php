<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kamar;
use App\Models\KategoriAset;
use App\Models\Pengurus;
use App\Models\SiteMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $siteMeta = SiteMeta::where('key', 'pendaftaran_pengurus')->first();
        $siteMeta2 = SiteMeta::where('key', 'kelola_pengurus')->first();
        $siteMetaValue = $siteMeta ? $siteMeta->value : '0';
        $totalberita = Berita::count();
        $totalgaleri = Galeri::count();
        $totalruang = Kamar::count();
        $totalkategoriaset = KategoriAset::count();
        $totalpengurus = Pengurus::where('status', 'AKTIF')->count();
        $totalaset = Aset::sum('jumlah');

        return view('admin.dashboard.index', compact('siteMeta2', 'siteMetaValue', 'totalberita', 'totalgaleri', 'totalaset', 'totalruang', 'totalkategoriaset', 'totalpengurus'));
    }

    public function pendaftaran_pengurus(Request $request)
    {
        $isChecked = $request->has('value') && $request->input('value') === '1';
        $value = $isChecked ? '1' : '0';

        SiteMeta::updateOrCreate(
            ['key' => 'pendaftaran_pengurus'],
            ['value' => $value]
        );

        return redirect('/dashboard');
    }

    public function kelola_pengurus(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $siteMeta = SiteMeta::where('key', 'kelola_pengurus')->first();

        if ($siteMeta && $siteMeta->value) {
            Storage::delete('public/struktur_pengurus/' . basename($siteMeta->value));
        }

        $request->foto?->store('public/struktur_pengurus');

        SiteMeta::updateOrCreate(
            ['key' => 'kelola_pengurus'],
            ['value' =>  $request->foto ? $request->foto->hashName() : null]
        );

        return redirect('/dashboard');
    }
}
