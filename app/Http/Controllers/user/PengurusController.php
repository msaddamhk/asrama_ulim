<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        return view('user.pengurus');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $pesananKamarAktif = $user->pesananKamar()->where('status', 'aktif')->first();

        if ($pesananKamarAktif) {
            $tanggalMasuk = Carbon::parse($pesananKamarAktif->tanggal_masuk);
            $sekarang = Carbon::now();
            $selisihTahun = $tanggalMasuk->diffInYears($sekarang);

            // $tanggalTertentu = Carbon::createFromDate(2027, 10, 20);
            // $selisihTahun = $tanggalMasuk->diffInYears($tanggalTertentu);

            if ($selisihTahun >= 2) {
                Pengurus::create([
                    'id_user' =>   $user->id,
                    'jabatan' => $request->jabatan,
                    'program_kerja' => $request->proker,
                ]);
                return redirect()->back()->with('success', 'Data Anda berhasil dikirim');
            } else {
                return redirect()->back()->with('success', 'Anda belum tinggal selama 2 tahun.');
            }
        } else {
            return redirect()->back()->with('success', 'Anda belum memiliki kamar aktif.');
        }
    }
}
