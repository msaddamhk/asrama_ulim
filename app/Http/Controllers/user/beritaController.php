<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Berita;
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
}
