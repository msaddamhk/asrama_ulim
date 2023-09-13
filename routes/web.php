<?php

use App\Http\Controllers\admin\AsetController;
use App\Http\Controllers\admin\AsetUtamaController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\KamarController;
use App\Http\Controllers\admin\KategoriAsetController;
use App\Http\Controllers\admin\KategoriBeritaController;
use App\Http\Controllers\admin\KelolaAdminController;
use App\Http\Controllers\admin\KelolaPengajuanKamarController;
use App\Http\Controllers\admin\KelolaPengurusController;
use App\Http\Controllers\admin\KelolaTanggapanController;
use App\Http\Controllers\admin\TamuController;
use App\Http\Controllers\admin\VerifikasiAnggotaController;
use App\Http\Controllers\admin\WaController;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\beritaController as UserBeritaController;
use App\Http\Controllers\user\GaleriController as UserGaleriController;
use App\Http\Controllers\user\PengurusController;
use App\Http\Controllers\user\PesanKamarController;
use App\Http\Controllers\user\TanggapanController;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/profil', function () {
    return view('user.profil');
})->name('profil');

Route::get('/keasramaan', function () {
    return view('user.keasramaan');
})->name('keasramaan');

Route::get('/kamar', function () {
    $kamar = Kamar::latest()
        ->where('status', "1")
        ->where('no_kamar', 'like', '%' . request('cari') . '%')
        ->paginate(6);
    return view('user.kamar', compact('kamar'));
})->name('kamar.index');

Route::get('/berita-kategori/{berita_kategori}', [UserBeritaController::class, 'berita_kategori'])->name('berita-kategori.index');

Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');

Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');

Route::get('/detail-kamar/{kamar}', [BerandaController::class, 'detail_kamar'])->name('detail-kamar');

Route::get('/berita/detail-berita/{berita}', [BerandaController::class, 'detail_berita'])->name('detail-berita');

Route::middleware('auth')->group(function () {

    Route::get('/tanggapan', [TanggapanController::class, 'daftar_tanggapan'])->name('daftar-tanggapan.index');

    Route::get('/isi-tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');

    Route::post('/isi-tanggapan/store', [TanggapanController::class, 'store'])->name('tanggapan.store');

    Route::get('/daftar-pengajuan-kamar', [PesanKamarController::class, 'index'])->name('daftar-pengajuan-kamar.index');

    Route::post('/detail-kamar/ajukan-kamar', [PesanKamarController::class, 'store'])->name('ajukan-kamar.store');

    Route::get('/daftar-pengurus', [PengurusController::class, 'index'])->name('pengurus.index');

    Route::post('/daftar-pengurus/store', [PengurusController::class, 'store'])->name('pengurus.store');

    Route::middleware('can:isAdmin')->group(function () {

        Route::resource('tamu', TamuController::class);

        Route::resource('kelola-ruang', KamarController::class);

        Route::resource('kelola-galeri', GaleriController::class);

        Route::resource('kelola-berita', BeritaController::class);

        Route::resource('kelola-aset', AsetUtamaController::class);

        Route::resource('kelola-admin', KelolaAdminController::class);

        Route::resource('kategori-berita', KategoriBeritaController::class);

        Route::resource('kategori-aset', KategoriAsetController::class);

        Route::get('ruangan/{kamar}/aset', [AsetController::class, 'index'])
            ->name('kamar.aset.index');

        Route::get('ruangan/{kamar}/aset/tambah', [AsetController::class, 'create'])
            ->name('kamar.aset.create');

        Route::post('ruangan/{kamar}/aset/tambah/store', [AsetController::class, 'store'])
            ->name('kamar.aset.store');

        Route::get('ruangan/{kamar}/aset/{aset}/edit', [AsetController::class, 'edit'])
            ->name('kamar.aset.edit');

        Route::get('/{kelola_aset}/download-no_aset', [AsetController::class, 'pdf'])->name('no_aset.index');

        Route::put('ruangan/{kamar}/aset/{aset}/edit/update', [AsetController::class, 'update'])
            ->name('kamar.aset.update');

        Route::delete('ruangan/{kamar}/aset/{aset}/hapus', [AsetController::class, 'destroy'])
            ->name('kamar.aset.destroy');

        Route::get('verifikasi-pengguna', [VerifikasiAnggotaController::class, 'index'])
            ->name('verifikasi.pengguna.index');

        Route::get('verifikasi-pengguna/{verifikasi_pengguna}', [VerifikasiAnggotaController::class, 'detail'])
            ->name('verifikasi.pengguna.detail');

        Route::post('verifikasi-anggota/{verifikasi_pengguna}', [VerifikasiAnggotaController::class, 'update'])
            ->name('verifikasi.pengguna.update');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::post('/dashboard/update-pendaftaran-pengurus', [DashboardController::class, 'pendaftaran_pengurus'])->name('pendaftaran-pengurus.store');

        Route::post('/dashboard/update-kelola-pengurus', [DashboardController::class, 'kelola_pengurus'])->name('kelola-struktur-pengurus.store');

        Route::get('/kelola-tanggapan', [KelolaTanggapanController::class, 'index'])->name('kelola-tanggapan.index');

        Route::post('/kelola-tanggapan/{kelola_tanggapan}/update', [KelolaTanggapanController::class, 'update'])->name('kelola-tanggapan.update');

        Route::get('/kelola-pengurus', [KelolaPengurusController::class, 'index'])->name('kelola-pengurus.index');

        Route::get('/kelola-pengurus/detail/{kelola_pengurus}', [KelolaPengurusController::class, 'detail'])->name('kelola-pengurus.detail');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_aktif', [KelolaPengurusController::class, 'update_aktif'])->name('kelola-pengurus.update_aktif');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_tolak', [KelolaPengurusController::class, 'update_tolak'])->name('kelola-pengurus.update_tolak');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_selesai', [KelolaPengurusController::class, 'update_selesai'])->name('kelola-pengurus.update_selesai');

        Route::get('/broadcast-wa', [WaController::class, 'index'])->name('wa.index');

        Route::post('/broadcast-wa/store', [WaController::class, 'send'])->name('wa.store');

        Route::get('pengajuan-kamar', [KelolaPengajuanKamarController::class, 'index'])->name('pengajuan-kamar.index');

        Route::get('pengajuan-kamar/detail/{pengajuan_kamar}', [KelolaPengajuanKamarController::class, 'detail'])->name('pengajuan-kamar.detail');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/booking', [KelolaPengajuanKamarController::class, 'update_booking'])->name('pengajuan-kamar.update_booking');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/di-terima', [KelolaPengajuanKamarController::class, 'update_aktif'])->name('pengajuan-kamar.update_aktif');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/di-tolak', [KelolaPengajuanKamarController::class, 'update_tolak'])->name('pengajuan-kamar.update_tolak');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/selesai', [KelolaPengajuanKamarController::class, 'update_selesai'])->name('pengajuan-kamar.update_selesai');

        Route::delete('pengajuan-kamar/{pengajuan_kamar}/delete', [KelolaPengajuanKamarController::class, 'delete'])->name('pengajuan-kamar.delete');
    });
});
