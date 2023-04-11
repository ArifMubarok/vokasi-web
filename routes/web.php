<?php

use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\BerandaController;
use App\Http\Controllers\Front\Web\akreditasi;
use App\Http\Controllers\Front\Web\beasiswa;
use App\Http\Controllers\Front\Web\bem;
use App\Http\Controllers\Front\Web\beritaController;
use App\Http\Controllers\Front\Web\BPU;
use App\Http\Controllers\Front\Web\bukuPedoman;
use App\Http\Controllers\Front\Web\BukudanModul;
use App\Http\Controllers\Front\Web\CDC;
use App\Http\Controllers\Front\Web\DokumenSV;
use App\Http\Controllers\Front\Web\fasilitasGedung;
use App\Http\Controllers\Front\Web\fasilitasLab;
use App\Http\Controllers\Front\Web\fasilitasLapangan;
use App\Http\Controllers\Front\Web\fasilitasRuang;
use App\Http\Controllers\Front\Web\fasilitasUNS;
use App\Http\Controllers\Front\Web\KalenderAkademikController;
use App\Http\Controllers\Front\Web\GrupRiset;
use App\Http\Controllers\Front\Web\HakidanPaten;
use App\Http\Controllers\Front\Web\ikaprodi;
use App\Http\Controllers\Front\Web\kerjasama;
use App\Http\Controllers\Front\Web\Konferensi;
use App\Http\Controllers\Front\Web\Ormawa;
use App\Http\Controllers\Front\Web\PenelitianDosen;
use App\Http\Controllers\Front\Web\pengabdianMasyarakat;
use App\Http\Controllers\Front\Web\PinjamRuang;
use App\Http\Controllers\Front\Web\PMB_UNS;
use App\Http\Controllers\Front\Web\ProdukUnggulan;
use App\Http\Controllers\Front\Web\ProfilPimpinan;
use App\Http\Controllers\Front\Web\ProfilSV;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Front\Web\ProgramStudiController;
use App\Http\Controllers\Front\Web\renstra;
use App\Http\Controllers\Front\Web\sdm;
use App\Http\Controllers\Front\Web\sejarahSV;
use App\Http\Controllers\Front\Web\SenatAkademikFakultas;
use App\Http\Controllers\Front\Web\strukturOrganisasi;
use App\Http\Controllers\Front\Web\UPM;
use App\Http\Controllers\Front\Web\VisiMisiTujuan;
use App\Models\Prodi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BerandaController::class, 'index'])->middleware('web');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::group(['prefix' => 'program-studi', 'as' => 'program-studi.'], function () {
    Route::get('', [ProgramStudiController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProgramStudiController::class, 'show'])->name('show');
    Route::get('/{slug}/{produk}', [ProgramStudiController::class, 'produk'])->name('produk');
});


//Berita

Route::group(['prefix' => 'berita', 'as' => 'berita.'], function () {
    Route::get('', [beritaController::class, 'index'])->name('index');
    Route::get('/{slug}', [beritaController::class, 'show'])->name('show');
});
Route::group(['prefix' => 'pmb-uns', 'as' => 'pmb-uns.'], function () {
    Route::get('', [PMB_UNS::class, 'index'])->name('index');
    Route::get('/{slug}', [PMB_UNS::class, 'show'])->name('show');
});


// Menu Tentang Kami
Route::group(['prefix' => 'profil-sv', 'as' => 'profil-sv.'], function () {
    Route::get('', [ProfilSV::class, 'index'])->name('index');
});

Route::group(['prefix' => 'visi-misi', 'as' => 'visi-misi.'], function () {
    Route::get('', [VisiMisiTujuan::class, 'index'])->name('index');
});

Route::group(['prefix' => 'senat-akademik-fakultas', 'as' => 'senat-akademik-fakultas.'], function () {
    Route::get('', [SenatAkademikFakultas::class, 'index'])->name('index');
});

Route::group(['prefix' => 'unit-pendukung', 'as' => 'unit-pendukung.'], function () {
    Route::get('/UPM-SV', [UPM::class, 'index'])->name('upm');
    Route::get('/BPU-SV', [BPU::class, 'index'])->name('bpu');
    Route::get('/career-development-center', [CDC::class, 'index'])->name('cdc');
});

Route::group(['prefix' => 'profil-pimpinan', 'as' => 'profil-pimpinan.'], function () {
    Route::get('', [ProfilPimpinan::class, 'index'])->name('index');
});

Route::group(['prefix' => 'sumber-daya-manusia', 'as' => 'sumber-daya-manusia.'], function () {
    Route::get('', [sdm::class, 'index'])->name('index');
});

Route::group(['prefix' => 'struktur-organisasi', 'as' => 'struktur-organisasi.'], function () {
    Route::get('', [strukturOrganisasi::class, 'index'])->name('index');
});

Route::group(['prefix' => 'renstra-sv', 'as' => 'renstra-sv.'], function () {
    Route::get('', [renstra::class, 'index'])->name('index');
    Route::get('/show/{name}', [renstra::class, 'show'])->name('show');
});

Route::group(['prefix' => 'sejarah', 'as' => 'sejarah.'], function () {
    Route::get('', [sejarahSV::class, 'index'])->name('index');
});
Route::group(['prefix' => 'kerjasama', 'as' => 'kerjasama.'], function () {
    Route::get('', [kerjasama::class, 'index'])->name('index');
});
Route::group(['prefix' => 'akreditasi', 'as' => 'akreditasi.'], function () {
    Route::get('', [akreditasi::class, 'index'])->name('index');
});
// Route::get('/sumber-daya-manusia', function () {
//     return view('front.tentang-kami.sumber-daya-manusia');
// });
// End Menu Tentang Kami

// Layanan Start
Route::group(['prefix' => 'download', 'as' => 'download.'], function () {
    Route::get('', [DokumenSV::class, 'index'])->name('index');
    Route::get('/show/{name}', [DokumenSV::class, 'show'])->name('show');
});
// Akademik Start
Route::group(['prefix' => 'kalender-akademik', 'as' => 'kalender-akademik.'], function () {
    Route::get('', [KalenderAkademikController::class, 'index'])->name('index');
});
Route::group(['prefix' => 'buku-pedoman', 'as' => 'buku-pedoman.'], function () {
    Route::get('', [bukuPedoman::class, 'index'])->name('index');
    Route::get('/show/{name}', [bukuPedoman::class, 'show'])->name('show');
});
// Akademik End
// Non Akademik Start
Route::group(['prefix' => 'pinjam-ruang', 'as' => 'pinjam-ruang.'], function () {
    Route::get('', [PinjamRuang::class, 'index'])->name('index');
});
// Non Akademik End
// Fasilitas Start
Route::group(['prefix' => 'fasilitas-gedung', 'as' => 'fasilitas-gedung.'], function () {
    Route::get('', [fasilitasGedung::class, 'index'])->name('index');
});
Route::group(['prefix' => 'fasilitas-ruang', 'as' => 'fasilitas-ruang.'], function () {
    Route::get('', [fasilitasRuang::class, 'index'])->name('index');
});
Route::group(['prefix' => 'fasilitas-laboratorium', 'as' => 'fasilitas-laboratorium.'], function () {
    Route::get('', [fasilitasLab::class, 'index'])->name('index');
});
Route::group(['prefix' => 'fasilitas-laboratorium-lapangan', 'as' => 'fasilitas-laboratorium-lapangan.'], function () {
    Route::get('', [fasilitasLapangan::class, 'index'])->name('index');
});
Route::group(['prefix' => 'fasilitas-uns', 'as' => 'fasilitas-uns.'], function () {
    Route::get('', [fasilitasUNS::class, 'index'])->name('index');
});
// Fasilitas End
// Layanan End

// Produk Start
Route::group(['prefix' => 'produk-unggulan', 'as' => 'produk-unggulan.'], function () {
    Route::get('', [ProdukUnggulan::class, 'index'])->name('index');
});
Route::group(['prefix' => 'grup-riset', 'as' => 'grup-riset.'], function () {
    Route::get('', [GrupRiset::class, 'index'])->name('index');
});
Route::get('/jurnal', function () {
    return view('front.produk.jurnal');
});
Route::group(['prefix' => 'konferensi', 'as' => 'konferensi.'], function () {
    Route::get('', [Konferensi::class, 'index'])->name('index');
});

Route::group(['prefix' => 'pengabdian-masyarakat', 'as' => 'pengabdian-masyarakat.'], function () {
    Route::get('', [pengabdianMasyarakat::class, 'index'])->name('index');
});
Route::group(['prefix' => 'haki-dan-paten', 'as' => 'haki-dan-paten.'], function () {
    Route::get('', [HakidanPaten::class, 'index'])->name('index');
    Route::get('list', [HakidanPaten::class, 'getList'])->name('list');
});

Route::group(['prefix' => 'penelitian-dosen', 'as' => 'penelitian-dosen.'], function () {
    Route::get('', [PenelitianDosen::class, 'index'])->name('index');
});

Route::group(['prefix' => 'buku-dan-modul', 'as' => 'buku-dan-modul.'], function () {
    Route::get('', [BukudanModul::class, 'index'])->name('index');
});
// Produk End

// Mahasiswa Start
Route::group(['prefix' => 'beasiswa', 'as' => 'beasiswa.'], function () {
    Route::get('', [beasiswa::class, 'index'])->name('index');
    Route::get('getData', [beasiswa::class, 'getData'])->name('getData');
});
Route::get('/vocational-coaching-corner', function () {
    return view('front.mahasiswa.vocational-coaching-corner');
});

Route::group(['prefix' => 'badan-eksekutif-mahasiswa', 'as' => 'badan-eksekutif-mahasiswa.'], function () {
    Route::get('', [bem::class, 'index'])->name('index');
});
Route::group(['prefix' => 'ormawa', 'as' => 'ormawa.'], function () {
    Route::get('', [Ormawa::class, 'index'])->name('index');
});
// Alumni Start

Route::group(['prefix' => 'ikaprodi', 'as' => 'ikaprodi.'], function () {
    Route::get('', [ikaprodi::class, 'index'])->name('index');
});
Route::get('/ikasv', function () {
    return view('front.mahasiswa.alumni.ikasv');
});
Route::get('/ikauns', function () {
    return view('front.mahasiswa.alumni.ikauns');
});
// Alumni End
// Mahasiswa End

Route::get('/coba-coba', function () {
    return view('coba');
});


require __DIR__ . '/superadmin.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/humas.php';
