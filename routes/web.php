<?php

use App\Http\Controllers\admin\AsetController;
use App\Http\Controllers\admin\AsetUtamaController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\KamarController;
use App\Http\Controllers\admin\KategoriAsetController;
use App\Http\Controllers\admin\KategoriBeritaController;
use App\Http\Controllers\admin\KelolaPengajuanKamarController;
use App\Http\Controllers\admin\KelolaPengurusController;
use App\Http\Controllers\admin\TamuController;
use App\Http\Controllers\admin\VerifikasiAnggotaController;
use App\Http\Controllers\admin\WaController;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\beritaController as UserBeritaController;
use App\Http\Controllers\user\GaleriController as UserGaleriController;
use App\Http\Controllers\user\PengurusController;
use App\Http\Controllers\user\PesanKamarController;
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

Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');

Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');

Route::get('/detail-kamar/{kamar}', [BerandaController::class, 'detail_kamar'])->name('detail-kamar');

Route::get('/berita/detail-berita/{berita}', [BerandaController::class, 'detail_berita'])->name('detail-berita');

Route::middleware('auth')->group(function () {

    Route::post('/detail-kamar/pengajuan-kamar', [PesanKamarController::class, 'store'])->name('pengajuan-kamar.store');

    Route::get('/daftar-pengurus', [PengurusController::class, 'index'])->name('pengurus.index');

    Route::post('/daftar-pengurus/store', [PengurusController::class, 'store'])->name('pengurus.store');

    Route::middleware('can:isAdmin')->group(function () {

        Route::get('/kelola-pengurus', [KelolaPengurusController::class, 'index'])->name('kelola-pengurus.index');

        Route::get('/kelola-pengurus/detail/{kelola_pengurus}', [KelolaPengurusController::class, 'detail'])->name('kelola-pengurus.detail');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_aktif', [KelolaPengurusController::class, 'update_aktif'])->name('kelola-pengurus.update_aktif');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_tolak', [KelolaPengurusController::class, 'update_tolak'])->name('kelola-pengurus.update_tolak');

        Route::post('/kelola-pengurus/detail/{kelola_pengurus}/update_selesai', [KelolaPengurusController::class, 'update_selesai'])->name('kelola-pengurus.update_selesai');

        Route::get('/broadcast-wa', [WaController::class, 'index'])->name('wa.index');

        Route::post('/broadcast-wa/store', [WaController::class, 'send'])->name('wa.store');

        Route::get('pengajuan-kamar', [KelolaPengajuanKamarController::class, 'index'])->name('pengajuan-kamar.index');

        Route::get('pengajuan-kamar/detail/{pengajuan_kamar}', [KelolaPengajuanKamarController::class, 'detail'])->name('pengajuan-kamar.detail');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/di-terima', [KelolaPengajuanKamarController::class, 'update_aktif'])->name('pengajuan-kamar.update_aktif');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/di-tolak', [KelolaPengajuanKamarController::class, 'update_tolak'])->name('pengajuan-kamar.update_tolak');

        Route::post('pengajuan-kamar/{pengajuan_kamar}/update/selesai', [KelolaPengajuanKamarController::class, 'update_selesai'])->name('pengajuan-kamar.update_selesai');

        Route::resource('kelola-ruang', KamarController::class);

        Route::resource('kategori-berita', KategoriBeritaController::class);

        Route::resource('kategori-aset', KategoriAsetController::class);

        Route::resource('kelola-galeri', GaleriController::class);

        Route::resource('kelola-berita', BeritaController::class);

        Route::resource('kelola-aset', AsetUtamaController::class);

        Route::resource('tamu', TamuController::class);

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
    });
});
