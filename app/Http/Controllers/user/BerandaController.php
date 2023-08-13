<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kamar;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BerandaController extends Controller
{
    public function index()
    {

        // $today = Carbon::now()->toDateString();


        // $kamar = Kamar::whereDoesntHave('pesananKamar', function ($query) use ($today) {
        //     $query->where('status', 'AKTIF')
        //         ->whereDate('tanggal_masuk', '<=', $today)
        //         ->whereDate('tanggal_keluar', '>=', $today);
        // })
        //     ->latest()
        //     ->paginate(4);

        $kamar = Kamar::where('status', "1")->latest()->paginate(4);
        $galeri = Galeri::latest()->paginate(8);
        $berita = Berita::latest()->paginate(8);

        return view('user.index', compact('kamar', 'galeri', 'berita'));
    }

    public function detail_kamar(Kamar $kamar)
    {
        return view('user.detail', compact('kamar'));
    }
    public function detail_berita(Berita $berita)
    {
        return view('user.detail_berita', compact('berita'));
    }
}
