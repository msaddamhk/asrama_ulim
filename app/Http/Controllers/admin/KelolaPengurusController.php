<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KelolaPengurusController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        if ($status) {
            $kelola_pengurus = Pengurus::where('status', $status)->latest()->paginate(15);
        } else {
            $kelola_pengurus = Pengurus::latest()->paginate(15);
        }

        return view('admin.pengurus.index', compact('kelola_pengurus'));
    }

    public function detail(Pengurus $kelola_pengurus)
    {
        return view('admin.pengurus.detail', compact('kelola_pengurus'));
    }

    public function update_aktif(Pengurus $kelola_pengurus)
    {
        $kelola_pengurus->status = "AKTIF";
        $kelola_pengurus->save();

        $namaPengguna = $kelola_pengurus->user->name;
        $emailPengguna = $kelola_pengurus->user->email;

        Mail::raw("Halo $namaPengguna,\n\n.Selamat Anda di terima sebagai Pengurus.", function ($message) use ($emailPengguna) {
            $message->to($emailPengguna)
                ->subject('Diterima sebagai Pengurus');
        });

        return redirect()->route('kelola-pengurus.index')->with('success', 'Data berhasil di update.');
    }

    public function update_tolak(Pengurus $kelola_pengurus)
    {
        $kelola_pengurus->status = "DI TOLAK";
        $kelola_pengurus->save();

        $namaPengguna = $kelola_pengurus->user->name;
        $emailPengguna = $kelola_pengurus->user->email;

        Mail::raw("Halo $namaPengguna,\n\n.Mohon maaf Anda di tolak sebagai Pengurus.", function ($message) use ($emailPengguna) {
            $message->to($emailPengguna)
                ->subject('Ditolak sebagai pengurus');
        });

        return redirect()->route('kelola-pengurus.index')->with('success', 'Data berhasil di update.');
    }

    public function update_selesai(Pengurus $kelola_pengurus)
    {
        $kelola_pengurus->status = "SELESAI";
        $kelola_pengurus->save();

        return redirect()->route('kelola-pengurus.index')->with('success', 'Data berhasil di update.');
    }
}
