<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class VerifikasiAnggotaController extends Controller
{
    public function index()
    {
        $verifikasi_pengguna = User::where('rule', 'USER')
            ->where('name', 'like', '%' . request('cari') . '%');

        $status = request('status');
        if ($status === '0' || $status === '1') {
            $verifikasi_pengguna = $verifikasi_pengguna->where('status', $status);
        }

        $verifikasi_pengguna = $verifikasi_pengguna->latest()->paginate(15);

        return view('admin.verifikasi_anggota.index', compact('verifikasi_pengguna'));
    }

    public function detail(User $verifikasi_pengguna)
    {
        return view('admin.verifikasi_anggota.detail', compact('verifikasi_pengguna'));
    }

    public function update(User $verifikasi_pengguna)
    {
        $verifikasi_pengguna->status = true;
        $verifikasi_pengguna->save();

        $namaPengguna = $verifikasi_pengguna->name;
        $emailPengguna = $verifikasi_pengguna->email;
        $loginUrl = route('login');

        Mail::send('admin.email.index', ['namaPengguna' => $namaPengguna, 'loginUrl' => $loginUrl], function ($message) use ($emailPengguna) {
            $message->to($emailPengguna)
                ->subject('Akun Anda Telah Diverifikasi');
        });

        return redirect()->route('verifikasi.pengguna.index')->with('success', 'Data berhasil di update.');
    }
}
