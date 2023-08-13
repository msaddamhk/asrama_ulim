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

class DashboardController extends Controller
{
    public function index()
    {
        $siteMeta = SiteMeta::where('key', 'pendaftaran_pengurus')->first();
        $siteMetaValue = $siteMeta ? $siteMeta->value : '0';
        $totalberita = Berita::count();
        $totalgaleri = Galeri::count();
        $totalruang = Kamar::count();
        $totalkategoriaset = KategoriAset::count();
        $totalpengurus = Pengurus::where('status', 'AKTIF')->count();
        $totalaset = Aset::sum('jumlah');

        return view('admin.dashboard.index', compact('siteMetaValue', 'totalberita', 'totalgaleri', 'totalaset', 'totalruang', 'totalkategoriaset', 'totalpengurus'));
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
}
