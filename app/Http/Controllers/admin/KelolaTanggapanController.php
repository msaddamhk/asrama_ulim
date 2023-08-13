<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class KelolaTanggapanController extends Controller
{
    public function index()
    {
        $kelola_tanggapan = Tanggapan::latest()->paginate(15);

        $status = request('status');

        if ($status === 'BELUM DI TIDAK LANJUTI' || $status === 'SEDANG DI TINDAK LANJUTI') {
            $kelola_tanggapan = Tanggapan::where('status', $status)->latest()->paginate(15);
        }

        $tanggapan = $kelola_tanggapan;

        return view('admin.tanggapan.index', compact('tanggapan'));
    }

    public function update(Tanggapan $kelola_tanggapan)
    {
        $kelola_tanggapan->status = "SEDANG DI TINDAK LANJUTI";
        $kelola_tanggapan->save();
        return redirect()->route('kelola-tanggapan.index')->with('success', 'Data berhasil di update.');
    }
}
