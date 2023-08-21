<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()
            ->where('judul', 'like', '%' . request('cari') . '%')
            ->paginate(6);
        return view('user.berita', compact('berita'));
    }

    public function berita_kategori(KategoriBerita $berita_kategori)
    {
        $berita = Berita::where('kategori_berita_id', $berita_kategori->id)
            ->where('judul', 'like', '%' . request('cari') . '%')
            ->paginate(6);
        return view('user.kategori_berita', compact('berita', 'berita_kategori'));
    }
}
