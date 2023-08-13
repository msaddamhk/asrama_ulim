<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        return view('user.tanggapan');
    }

    public function store(Request $request)
    {
        Tanggapan::create([
            'id_user' =>  auth()->user()->id,
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()->route('daftar-tanggapan.index');
    }

    public function daftar_tanggapan(Request $request)
    {
        $tanggapan = Tanggapan::where('id_user', auth()->user()->id)->latest()->paginate(15);
        return view('user.daftar_tanggapan', compact('tanggapan'));
    }
}
