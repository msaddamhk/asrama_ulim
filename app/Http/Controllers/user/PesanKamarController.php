<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PesananKamar;
use Illuminate\Http\Request;

class PesanKamarController extends Controller
{

    public function index()
    {
        $pengajuan_kamar = PesananKamar::where('id_user', auth()->user()->id)->latest()->paginate(15);
        return view('user.pengajuan_kamar', compact('pengajuan_kamar'));
    }

    public function store(Request $request)
    {

        // $pesanan_tumpang_tindih = PesananKamar::where('id_kamar', $request->kamar)
        //     ->where('status', 'AKTIF')
        //     ->where(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
        //         $query->where(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
        //             $query->whereDate('tanggal_masuk', '<=', $tanggal_masuk)
        //                 ->whereDate('tanggal_keluar', '>=', $tanggal_masuk);
        //         })
        //             ->orWhere(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
        //                 $query->whereDate('tanggal_masuk', '>', $tanggal_masuk)
        //                     ->whereDate('tanggal_masuk', '<=', $tanggal_keluar);
        //             });
        //     })
        //     ->first();

        $tanggal_masuk = $request->tanggal_masuk;
        $tanggal_keluar = $request->tanggal_keluar;

        $pesanan_tumpang_tindih = PesananKamar::where('id_kamar', $request->kamar)
            ->where(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
                $query->where('status', 'AKTIF')
                    ->orWhere('status', 'BOOKING');
            })
            ->where(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
                $query->where(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
                    $query->whereDate('tanggal_masuk', '<=', $tanggal_masuk)
                        ->whereDate('tanggal_keluar', '>=', $tanggal_masuk);
                })
                    ->orWhere(function ($query) use ($tanggal_masuk, $tanggal_keluar) {
                        $query->whereDate('tanggal_masuk', '>', $tanggal_masuk)
                            ->whereDate('tanggal_masuk', '<=', $tanggal_keluar);
                    });
            })
            ->first();

        if ($pesanan_tumpang_tindih) {
            $tanggal_mulai = $pesanan_tumpang_tindih->tanggal_masuk;
            $tanggal_selesai = $pesanan_tumpang_tindih->tanggal_keluar;
            return back()->with('pesan', "Kamar sudah di isi pada rentang tanggal $tanggal_mulai hingga $tanggal_selesai oleh Orang lain.");
        }

        $pengajuan_kamar = new PesananKamar();
        $pengajuan_kamar->id_user = auth()->user()->id;
        $pengajuan_kamar->id_kamar = $request->kamar;
        $pengajuan_kamar->status = "BELUM DI VERIFIKASI";
        $pengajuan_kamar->tanggal_masuk = $request->tanggal_masuk;
        $pengajuan_kamar->tanggal_keluar = $request->tanggal_keluar;

        $pengajuan_kamar->save();

        return redirect()->route('daftar-pengajuan-kamar.index');
    }
}
