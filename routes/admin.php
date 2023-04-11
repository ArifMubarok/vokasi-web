<?php

use App\Http\Controllers\Back\Admin\BukuController;
use App\Http\Controllers\Back\Admin\DokumenAkreditasiController;
use App\Http\Controllers\Back\Admin\HakidanPatenController;
use App\Http\Controllers\Back\Admin\InformasiUmum\InformasiUmumController;
use App\Http\Controllers\Back\Admin\pages\FasilitasController;
use App\Http\Controllers\Back\Admin\pages\GambaranUmumController;
use App\Http\Controllers\Back\Admin\pages\KerjasamaController;
use App\Http\Controllers\Back\Admin\pages\KeunggulanController;
use App\Http\Controllers\Back\Admin\pages\LaboratoriumController;
use App\Http\Controllers\Back\Admin\pages\ProfilLulusanController;
use App\Http\Controllers\Back\Admin\pages\SambutanController;
use App\Http\Controllers\Back\Admin\pages\TestimoniController;
use App\Http\Controllers\Back\Admin\pages\VisiMisiTujuanController;
use App\Http\Controllers\Back\Admin\PengabdianMasyarakatController;
use App\Http\Controllers\Back\Admin\ProdukUnggulanController;
use App\Http\Controllers\Back\Admin\PenelitianDosenController;
use App\Http\Controllers\Back\Admin\SDM\SdmProdiController;
use App\Http\Controllers\Back\Superadmin\Produk\GrupRisetController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['prefix' => 'informasi', 'as' => 'informasi.'], function () {
            Route::get('/list', [InformasiUmumController::class, 'getList'])->name('list');
            Route::get('/', [InformasiUmumController::class, 'index'])->name('index');
            Route::get('/create', [InformasiUmumController::class, 'create'])->name('create');
            Route::post('/', [InformasiUmumController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [InformasiUmumController::class, 'edit'])->name('edit');
            Route::put('/{id}', [InformasiUmumController::class, 'update'])->name('update');
            Route::post('/hapus', [InformasiUmumController::class, 'hapus'])->name('hapus');
        });

        Route::group(['prefix' => 'grup-riset', 'as' => 'grup-riset.'], function () {
            Route::get('/list', [GrupRisetController::class, 'getList'])->name('list');
            Route::get('/', [GrupRisetController::class, 'index'])->name('index');
            Route::get('/create', [GrupRisetController::class, 'create'])->name('create');
            Route::post('/', [GrupRisetController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [GrupRisetController::class, 'edit'])->name('edit');
            Route::put('/{id}', [GrupRisetController::class, 'update'])->name('update');
            Route::post('/hapus', [GrupRisetController::class, 'hapus'])->name('hapus');
        });

        


        Route::group(['prefix' => 'akreditasi', 'as' => 'akreditasi.'], function () {
            Route::get('/list', [DokumenAkreditasiController::class, 'getList'])->name('list');
            Route::get('/', [DokumenAkreditasiController::class, 'index'])->name('index');
            Route::get('/create', [DokumenAkreditasiController::class, 'create'])->name('create');
            Route::post('/', [DokumenAkreditasiController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [DokumenAkreditasiController::class, 'edit'])->name('edit');
            Route::put('/{id}', [DokumenAkreditasiController::class, 'update'])->name('update');
            Route::post('/hapus', [DokumenAkreditasiController::class, 'hapus'])->name('hapus');
        });


        Route::group(['prefix' => 'penelitian-dosen', 'as' => 'penelitian-dosen.'], function () {
            Route::get('/list', [PenelitianDosenController::class, 'getList'])->name('list');
            Route::get('/', [PenelitianDosenController::class, 'index'])->name('index');
            Route::get('/create', [PenelitianDosenController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PenelitianDosenController::class, 'show'])->name('show');
            Route::post('/', [PenelitianDosenController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PenelitianDosenController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PenelitianDosenController::class, 'update'])->name('update');
            Route::post('/hapus', [PenelitianDosenController::class, 'hapus'])->name('hapus');
        });
        
        
        Route::group(['prefix' => 'produk-unggulan', 'as' => 'produk-unggulan.'], function () {
            Route::get('/list', [ProdukUnggulanController::class, 'getList'])->name('list');
            Route::get('/', [ProdukUnggulanController::class, 'index'])->name('index');
            Route::get('/create', [ProdukUnggulanController::class, 'create'])->name('create');
            Route::post('/', [ProdukUnggulanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProdukUnggulanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProdukUnggulanController::class, 'update'])->name('update');
            Route::post('/hapus', [ProdukUnggulanController::class, 'hapus'])->name('hapus');
        });


        Route::group(['prefix' => 'bukudanmodul', 'as' => 'bukudanmodul.'], function () {
            Route::get('/list', [BukuController::class, 'getList'])->name('list');
            Route::get('/', [BukuController::class, 'index'])->name('index');
            Route::get('/create', [BukuController::class, 'create'])->name('create');
            Route::post('/', [BukuController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [BukuController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BukuController::class, 'update'])->name('update');
            Route::post('/hapus', [BukuController::class, 'hapus'])->name('hapus');
        });


        Route::group(['prefix' => 'hakidanpaten', 'as' => 'hakidanpaten.'], function () {
            Route::get('/list', [HakidanPatenController::class, 'getList'])->name('list');
            Route::get('/', [HakidanPatenController::class, 'index'])->name('index');
            Route::get('/create', [HakidanPatenController::class, 'create'])->name('create');
            Route::post('/', [HakidanPatenController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [HakidanPatenController::class, 'edit'])->name('edit');
            Route::put('/{id}', [HakidanPatenController::class, 'update'])->name('update');
            Route::post('/hapus', [HakidanPatenController::class, 'hapus'])->name('hapus');
        });

        Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
            Route::group(['prefix' => 'sambutan', 'as' => 'sambutan.'], function () {
                Route::get('/', [SambutanController::class, 'index'])->name('index');
                Route::get('/create', [SambutanController::class, 'create'])->name('create');
                Route::post('/', [SambutanController::class, 'store'])->name('store');
                Route::get('/edit', [SambutanController::class, 'edit'])->name('edit');
                Route::put('/', [SambutanController::class, 'update'])->name('update');
                Route::post('/destroy', [SambutanController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'gambaran', 'as' => 'gambaran.'], function () {
                Route::get('/', [GambaranUmumController::class, 'index'])->name('index');
                Route::get('/create', [GambaranUmumController::class, 'create'])->name('create');
                Route::post('/', [GambaranUmumController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [GambaranUmumController::class, 'edit'])->name('edit');
                Route::put('/{id}', [GambaranUmumController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [GambaranUmumController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'keunggulan', 'as' => 'keunggulan.'], function () {
                Route::get('/', [KeunggulanController::class, 'index'])->name('index');
                Route::get('/create', [KeunggulanController::class, 'create'])->name('create');
                Route::post('/', [KeunggulanController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [KeunggulanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [KeunggulanController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [KeunggulanController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'visi-misi-tujuan', 'as' => 'visi-misi-tujuan.'], function () {
                Route::get('/', [VisiMisiTujuanController::class, 'index'])->name('index');
                Route::get('/create', [VisiMisiTujuanController::class, 'create'])->name('create');
                Route::post('/', [VisiMisiTujuanController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [VisiMisiTujuanController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [VisiMisiTujuanController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'profil-lulusan', 'as' => 'profil-lulusan.'], function () {
                Route::get('/', [ProfilLulusanController::class, 'index'])->name('index');
                Route::get('/create', [ProfilLulusanController::class, 'create'])->name('create');
                Route::post('/', [ProfilLulusanController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ProfilLulusanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ProfilLulusanController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [ProfilLulusanController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'fasilitas', 'as' => 'fasilitas.'], function () {
                Route::get('/', [FasilitasController::class, 'index'])->name('index');
                Route::get('/create', [FasilitasController::class, 'create'])->name('create');
                Route::post('/', [FasilitasController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [FasilitasController::class, 'edit'])->name('edit');
                Route::put('/{id}', [FasilitasController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [FasilitasController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'laboratorium', 'as' => 'laboratorium.'], function () {
                Route::get('/', [LaboratoriumController::class, 'index'])->name('index');
                Route::get('/create', [LaboratoriumController::class, 'create'])->name('create');
                Route::post('/', [LaboratoriumController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [LaboratoriumController::class, 'edit'])->name('edit');
                Route::put('/{id}', [LaboratoriumController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [LaboratoriumController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'kerjasama', 'as' => 'kerjasama.'], function () {
                Route::get('/', [KerjasamaController::class, 'index'])->name('index');
                Route::get('/create', [KerjasamaController::class, 'create'])->name('create');
                Route::post('/', [KerjasamaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [KerjasamaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [KerjasamaController::class, 'update'])->name('update');
                Route::post('/{id}/destroy', [KerjasamaController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'testimoni', 'as' => 'testimoni.'], function () {
                Route::get('/list', [TestimoniController::class, 'getList'])->name('list');
                Route::get('/', [TestimoniController::class, 'index'])->name('index');
                Route::get('/create', [TestimoniController::class, 'create'])->name('create');
                Route::post('/', [TestimoniController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [TestimoniController::class, 'edit'])->name('edit');
                Route::put('/{id}', [TestimoniController::class, 'update'])->name('update');
                Route::post('/hapus', [TestimoniController::class, 'hapus'])->name('hapus');
            });
        });
        Route::group(['prefix' => 'sdm', 'as' => 'sdm.'], function () {
            Route::get('/list', [SdmProdiController::class, 'getList'])->name('list');
            Route::get('/', [SdmProdiController::class, 'index'])->name('index');
            Route::get('/create', [SdmProdiController::class, 'create'])->name('create');
            Route::post('/', [SdmProdiController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [SdmProdiController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SdmProdiController::class, 'update'])->name('update');
            Route::post('/hapus', [SdmProdiController::class, 'hapus'])->name('hapus');
        });

        Route::group(['prefix' => 'pengabdian-masyarakat', 'as' => 'pengabdian-masyarakat.'], function () {
            Route::get('/list', [PengabdianMasyarakatController::class, 'getBerita'])->name('list');
            Route::get('/', [PengabdianMasyarakatController::class, 'index'])->name('index');
            Route::get('/show/{id}', [PengabdianMasyarakatController::class, 'show'])->name('show');
            Route::get('/create', [PengabdianMasyarakatController::class, 'create'])->name('create');
            Route::post('/', [PengabdianMasyarakatController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PengabdianMasyarakatController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PengabdianMasyarakatController::class, 'update'])->name('update');
            Route::post('/hapus', [PengabdianMasyarakatController::class, 'hapus'])->name('hapus');
        });
    });
});