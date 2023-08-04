<?php

use App\Http\Controllers\admin\AsetController;
use App\Http\Controllers\admin\AsetUtamaController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\KamarController;
use App\Http\Controllers\admin\KategoriAsetController;
use App\Http\Controllers\admin\KategoriBeritaController;
use App\Http\Controllers\admin\TamuController;
use App\Http\Controllers\admin\VerifikasiAnggotaController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', function () {
//     return view('layout.admin.main');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
