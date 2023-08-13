<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\PesananKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KelolaPengajuanKamarController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        if ($status) {
            $pengajuan_kamar = PesananKamar::where('status', $status)->latest()->paginate(15);
        } else {
            $pengajuan_kamar = PesananKamar::latest()->paginate(15);
        }

        return view('admin.pengajuan_kamar.index', compact('pengajuan_kamar'));
    }

    public function detail(PesananKamar $pengajuan_kamar)
    {
        return view('admin.pengajuan_kamar.detail', compact('pengajuan_kamar'));
    }

    public function update_aktif(PesananKamar $pengajuan_kamar)
    {
        $kamar = Kamar::where('id',  $pengajuan_kamar->id_kamar)->first();
        $kamar->status = "0";
        $kamar->save();

        $pengajuan_kamar->status = "AKTIF";
        $pengajuan_kamar->save();

        $namaPengguna = $pengajuan_kamar->user->name;
        $emailPengguna = $pengajuan_kamar->user->email;

        Mail::raw("Halo $namaPengguna,\n\n.Selamat pengajuan kamar Anda DITERIMA.", function ($message) use ($emailPengguna) {
            $message->to($emailPengguna)
                ->subject('pengajuan kamar anda di terima');
        });

        return redirect()->route('pengajuan-kamar.index')->with('success', 'Data berhasil di update.');
    }

    public function update_tolak(PesananKamar $pengajuan_kamar)
    {
        $pengajuan_kamar->status = "DI TOLAK";
        $pengajuan_kamar->save();

        $namaPengguna = $pengajuan_kamar->user->name;
        $emailPengguna = $pengajuan_kamar->user->email;

        Mail::raw("Halo $namaPengguna,\n\n.Mohon maaf pengajuan kamar Anda DITOLAK.", function ($message) use ($emailPengguna) {
            $message->to($emailPengguna)
                ->subject('pengajuan kamar anda di tolak');
        });

        return redirect()->route('pengajuan-kamar.index')->with('success', 'Data berhasil di update.');
    }

    public function update_selesai(PesananKamar $pengajuan_kamar)
    {
        $kamar = Kamar::where('id',  $pengajuan_kamar->id_kamar)->first();
        $kamar->status = "1";
        $kamar->save();

        $pengajuan_kamar->status = "SELESAI";
        $pengajuan_kamar->save();

        return redirect()->route('pengajuan-kamar.index')->with('success', 'Data berhasil di update.');
    }
}
