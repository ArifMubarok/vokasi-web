<?php

use App\Http\Controllers\Back\Superadmin\BerandaController;
use App\Http\Controllers\Back\Superadmin\Layanan\BukuPedomanController;
use App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus\FasilitasGedungController;
use App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus\FasilitasLabController;
use App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus\FasilitasLapanganController;
use App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus\FasilitasRuangController;
use App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus\FasilitasUNSController;
use App\Http\Controllers\Back\Superadmin\Layanan\KalenderController;
use App\Http\Controllers\Back\Superadmin\Layanan\PinjamRuangController;
use App\Http\Controllers\Back\Superadmin\Mahasiswa\BeasiswaController;
use App\Http\Controllers\Back\Superadmin\Mahasiswa\BEMController;
use App\Http\Controllers\Back\Superadmin\Mahasiswa\IkaProdiController;
use App\Http\Controllers\Back\Superadmin\Mahasiswa\OrmawaController;
use App\Http\Controllers\Back\Superadmin\Produk\KonferensiController;
use App\Http\Controllers\Back\Superadmin\Produk\ProdukUnggulanController;
use App\Http\Controllers\Back\Superadmin\Produk\JurnalController;
use App\Http\Controllers\Back\Superadmin\Settings\ProdiController;
use App\Http\Controllers\Back\Superadmin\Settings\UserController;
use App\Http\Controllers\Back\Superadmin\TentangKami\akreditasiController;
use App\Http\Controllers\Back\Superadmin\TentangKami\DokumenController;
use App\Http\Controllers\Back\Superadmin\TentangKami\kerjasamaController;
use App\Http\Controllers\Back\Superadmin\TentangKami\ProfilController;
use App\Http\Controllers\Back\Superadmin\TentangKami\ProfilPimpinanController;
use App\Http\Controllers\Back\Superadmin\TentangKami\RenstraController;
use App\Http\Controllers\Back\Superadmin\TentangKami\sdmController;
use App\Http\Controllers\Back\Superadmin\TentangKami\SejarahController;
use App\Http\Controllers\Back\Superadmin\TentangKami\SenatController;
use App\Http\Controllers\Back\Superadmin\TentangKami\StrukturOrganisasiController;
use App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung\BPUController;
use App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung\CDCControlller;
use App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung\UPMController;
use App\Http\Controllers\Back\Superadmin\TentangKami\VisiMisiTujuanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['prefix' => 'beranda', 'as' => 'beranda.'], function () {
            Route::get('', [BerandaController::class, 'index'])->name('index');
            Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
                Route::get('/{id}/edit', [BerandaController::class, 'profileEdit'])->name('edit');
                Route::get('/{id}/editYoutube', [BerandaController::class, 'editYoutube'])->name('editYoutube');
                Route::put('/{id}', [BerandaController::class, 'profileUpdate'])->name('update');
            });
        });

        Route::group(['prefix' => 'tentangkami', 'as' => 'tentangkami.'], function () {
            Route::group(['prefix' => 'profil', 'as' => 'profil.'], function () {
                Route::get('', [ProfilController::class, 'index'])->name('index');
                Route::get('/{id}/editprofil', [ProfilController::class, 'editProfil'])->name('editprofil');
                Route::get('/{id}/editpicture', [ProfilController::class, 'editPicture'])->name('editpicture');
                Route::get('/{id}/editsambutan', [ProfilController::class, 'editSambutan'])->name('editsambutan');
                Route::put('/{id}', [ProfilController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'sejarah', 'as' => 'sejarah.'], function () {
                Route::get('', [SejarahController::class, 'index'])->name('index');
                Route::get('/{id}/edit', [SejarahController::class, 'edit'])->name('edit');
                Route::put('/{id}', [SejarahController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'visi-misi-tujuan', 'as' => 'visi-misi-tujuan.'], function () {
                Route::get('', [VisiMisiTujuanController::class, 'index'])->name('index');
                Route::group(['prefix' => 'visi', 'as' => 'visi.'], function () {
                    Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'visiEdit'])->name('edit');
                    Route::put('/{id}', [VisiMisiTujuanController::class, 'visiUpdate'])->name('update');
                });
                Route::group(['prefix' => 'misi', 'as' => 'misi.'], function () {
                    Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'misiEdit'])->name('edit');
                    Route::put('/{id}', [VisiMisiTujuanController::class, 'misiUpdate'])->name('update');
                });
                Route::group(['prefix' => 'tujuan', 'as' => 'tujuan.'], function () {
                    Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'tujuanEdit'])->name('edit');
                    Route::put('/{id}', [VisiMisiTujuanController::class, 'tujuanUpdate'])->name('update');
                });
                Route::group(['prefix' => 'strategi', 'as' => 'strategi.'], function () {
                    Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'strategiEdit'])->name('edit');
                    Route::put('/{id}', [VisiMisiTujuanController::class, 'strategiUpdate'])->name('update');
                });
                Route::group(['prefix' => 'gambar', 'as' => 'gambar.'], function () {
                    Route::get('/{id}/edit', [VisiMisiTujuanController::class, 'gambarEdit'])->name('gambarEdit');
                    Route::put('/{id}', [VisiMisiTujuanController::class, 'gambarUpdate'])->name('gambarUpdate');
                });
            });

            Route::group(['prefix' => 'renstra', 'as' => 'renstra.'], function () {
                Route::get('list', [RenstraController::class, 'getRenstra'])->name('list');
                Route::get('', [RenstraController::class, 'index'])->name('index');
                Route::get('/create', [RenstraController::class, 'create'])->name('create');
                Route::post('/', [RenstraController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [RenstraController::class, 'edit'])->name('edit');
                Route::get('/show/{name}', [RenstraController::class, 'show'])->name('show');
                Route::put('/{id}', [RenstraController::class, 'update'])->name('update');
                Route::post('/hapus', [RenstraController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'struktur-organisasi', 'as' => 'struktur-organisasi.'], function () {
                Route::get('', [StrukturOrganisasiController::class, 'index'])->name('index');
                Route::get('/create', [StrukturOrganisasiController::class, 'create'])->name('create');
                Route::post('/store', [StrukturOrganisasiController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [StrukturOrganisasiController::class, 'edit'])->name('edit');
                Route::put('/{id}', [StrukturOrganisasiController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'senat', 'as' => 'senat.'], function () {
                Route::get('', [SenatController::class, 'index'])->name('index');
                Route::group(['prefix' => 'ketua', 'as' => 'ketua.'], function () {
                    Route::get('/{id}/edit', [SenatController::class, 'editKetua'])->name('edit');
                    Route::put('/{id}', [SenatController::class, 'updateKetua'])->name('update');
                });
                Route::group(['prefix' => 'anggota', 'as' => 'anggota.'], function () {
                    Route::get('/{id}/edit', [SenatController::class, 'editAnggota'])->name('edit');
                    Route::put('/{id}', [SenatController::class, 'updateAnggota'])->name('update');
                });
                Route::post('/hapus', [SenatController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'profil-pimpinan', 'as' => 'profil-pimpinan.'], function () {
                Route::group(['prefix' => 'dekan', 'as' => 'dekan.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexDekan'])->name('index');
                    Route::get('listDekan', [ProfilPimpinanController::class, 'getDekan'])->name('listDekan');
                });
                Route::group(['prefix' => 'senat', 'as' => 'senat.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexSenat'])->name('index');
                    Route::get('listSenat', [ProfilPimpinanController::class, 'getSenat'])->name('listSenat');
                });
                Route::group(['prefix' => 'koordinator', 'as' => 'koordinator.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexKoordinator'])->name('index');
                    Route::get('listKoordinator', [ProfilPimpinanController::class, 'getKoordinator'])->name('listKoordinator');
                });
                Route::group(['prefix' => 'mutu', 'as' => 'mutu.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexMutu'])->name('index');
                    Route::get('listMutu', [ProfilPimpinanController::class, 'getMutu'])->name('listMutu');
                });
                Route::group(['prefix' => 'lain', 'as' => 'lain.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexLain'])->name('index');
                    Route::get('listLain', [ProfilPimpinanController::class, 'getLain'])->name('listLain');
                });
                Route::group(['prefix' => 'prodi', 'as' => 'prodi.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexProdi'])->name('index');
                    Route::get('listProdi', [ProfilPimpinanController::class, 'getProdi'])->name('listProdi');
                });
                Route::group(['prefix' => 'laboratorium', 'as' => 'laboratorium.'], function () {
                    Route::get('', [ProfilPimpinanController::class, 'indexLaboratorium'])->name('index');
                    Route::get('listLaboratorium', [ProfilPimpinanController::class, 'getLaboratorium'])->name('listLaboratorium');
                });
                Route::get('', [ProfilPimpinanController::class, 'index'])->name('index');
                Route::get('/create', [ProfilPimpinanController::class, 'create'])->name('create');
                Route::post('/', [ProfilPimpinanController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ProfilPimpinanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ProfilPimpinanController::class, 'update'])->name('update');
                Route::post('/hapus', [ProfilPimpinanController::class, 'hapus'])->name('hapus');
            });
            Route::group(['prefix' => 'dokumen', 'as' => 'dokumen.'], function () {
                Route::get('list', [DokumenController::class, 'getDokumen'])->name('list');
                Route::get('', [DokumenController::class, 'index'])->name('index');
                Route::get('/create', [DokumenController::class, 'create'])->name('create');
                Route::post('/', [DokumenController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [DokumenController::class, 'edit'])->name('edit');
                Route::get('/show/{name}', [DokumenController::class, 'show'])->name('show');
                Route::put('/{id}', [DokumenController::class, 'update'])->name('update');
                Route::post('/hapus', [DokumenController::class, 'hapus'])->name('hapus');
            });
            Route::group(['prefix' => 'unit-pendukung', 'as' => 'unit-pendukung.'], function () {
                Route::group(['prefix' => 'UPM', 'as' => 'UPM.'], function () {
                    Route::get('', [UPMController::class, 'index'])->name('index');
                    Route::get('listMutu', [UPMController::class, 'getMutu'])->name('listMutu');
                    Route::get('/create', [UPMController::class, 'create'])->name('create');
                    Route::get('/edit', [UPMController::class, 'edit'])->name('edit');
                    Route::put('/', [UPMController::class, 'update'])->name('update');
                    Route::post('/hapus', [UPMController::class, 'hapus'])->name('hapus');
                });
                Route::group(['prefix' => 'BPU', 'as' => 'BPU.'], function () {
                    Route::get('', [BPUController::class, 'index'])->name('index');
                    Route::get('/create', [BPUController::class, 'create'])->name('create');
                    Route::get('/edit', [BPUController::class, 'edit'])->name('edit');
                    Route::put('/', [BPUController::class, 'update'])->name('update');
                    Route::post('/hapus', [BPUController::class, 'hapus'])->name('hapus');
                });
                Route::group(['prefix' => 'CDC', 'as' => 'CDC.'], function () {
                    Route::get('', [CDCControlller::class, 'index'])->name('index');
                    Route::get('/create', [CDCControlller::class, 'create'])->name('create');
                    Route::get('/edit', [CDCControlller::class, 'edit'])->name('edit');
                    Route::put('/', [CDCControlller::class, 'update'])->name('update');
                    Route::post('/hapus', [CDCControlller::class, 'hapus'])->name('hapus');
                });
            });

            Route::group(['prefix' => 'sdm', 'as' => 'sdm.'], function () {
                Route::get('list', [sdmController::class, 'getList'])->name('list');
                Route::get('', [sdmController::class, 'index'])->name('index');
                Route::get('/create', [sdmController::class, 'create'])->name('create');
                Route::post('/', [sdmController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [sdmController::class, 'edit'])->name('edit');
                Route::put('/{id}', [sdmController::class, 'update'])->name('update');
                Route::post('/hapus', [sdmController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'akreditasi', 'as' => 'akreditasi.'], function () {
                Route::get('list', [akreditasiController::class, 'getList'])->name('list');
                Route::get('', [akreditasiController::class, 'index'])->name('index');
                Route::get('/create', [akreditasiController::class, 'create'])->name('create');
                Route::post('/', [akreditasiController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [akreditasiController::class, 'edit'])->name('edit');
                Route::put('/{id}', [akreditasiController::class, 'update'])->name('update');
                Route::post('/hapus', [akreditasiController::class, 'hapus'])->name('hapus');
            });


            Route::group(['prefix' => 'kerjasama', 'as' => 'kerjasama.'], function () {
                Route::get('list', [kerjasamaController::class, 'getList'])->name('list');
                Route::get('', [kerjasamaController::class, 'index'])->name('index');
                Route::get('/create', [kerjasamaController::class, 'create'])->name('create');
                Route::post('/', [kerjasamaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [kerjasamaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [kerjasamaController::class, 'update'])->name('update');
                Route::post('/hapus', [kerjasamaController::class, 'hapus'])->name('hapus');


                Route::get('/{id}/editDeskripsi', [kerjasamaController::class, 'editDeskripsi'])->name('editDeskripsi');
                Route::get('/{id}/editLink', [kerjasamaController::class, 'editLink'])->name('editLink');
                Route::get('/{id}/editGambar', [kerjasamaController::class, 'editGambar'])->name('editGambar');
                Route::put('/{id}/updateData', [kerjasamaController::class, 'updateData'])->name('updateData');
            });
        });

        Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
            Route::group(['prefix' => 'konferensi', 'as' => 'konferensi.'], function () {
                Route::get('list', [KonferensiController::class, 'getList'])->name('list');
                Route::get('', [KonferensiController::class, 'index'])->name('index');
                Route::get('/create', [KonferensiController::class, 'create'])->name('create');
                Route::post('/', [KonferensiController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [KonferensiController::class, 'edit'])->name('edit');
                Route::put('/{id}', [KonferensiController::class, 'update'])->name('update');
                Route::post('/hapus', [KonferensiController::class, 'hapus'])->name('hapus');
            });
            Route::group(['prefix' => 'produk-unggulan', 'as' => 'produk-unggulan.'], function () {
                Route::get('', [ProdukUnggulanController::class, 'index'])->name('index');
                Route::get('/{id}/edit', [ProdukUnggulanController::class, 'profileEdit'])->name('edit');
                Route::get('/{id}/editYoutube', [ProdukUnggulanController::class, 'editYoutube'])->name('editYoutube');
                Route::put('/{id}', [ProdukUnggulanController::class, 'profileUpdate'])->name('update');
            });
            Route::group(['prefix' => 'jurnal', 'as' => 'jurnal.'], function () {
                Route::get('/list', [JurnalController::class, 'getList'])->name('list');
                Route::get('/', [JurnalController::class, 'index'])->name('index');
                Route::get('/create', [JurnalController::class, 'create'])->name('create');
                Route::post('/', [JurnalController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [JurnalController::class, 'edit'])->name('edit');
                Route::put('/{id}', [JurnalController::class, 'update'])->name('update');
                Route::post('/hapus', [JurnalController::class, 'hapus'])->name('hapus');
            });
        });

        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('list', [UserController::class, 'getUser'])->name('listUser');
                Route::get('listAdmin', [UserController::class, 'getAdmin'])->name('listAdmin');
                Route::get('', [UserController::class, 'index'])->name('index');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/', [UserController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
                Route::put('/{id}', [UserController::class, 'update'])->name('update');
                Route::post('/hapus', [UserController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'prodi', 'as' => 'prodi.'], function () {
                Route::get('/list', [ProdiController::class, 'getProdi'])->name('list');
                Route::get('/', [ProdiController::class, 'index'])->name('index');
                Route::get('/create', [ProdiController::class, 'create'])->name('create');
                Route::post('/', [ProdiController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ProdiController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ProdiController::class, 'update'])->name('update');
                Route::post('/hapus', [ProdiController::class, 'hapus'])->name('hapus');
            });
        });

        Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function () {
            Route::group(['prefix' => 'ormawa', 'as' => 'ormawa.'], function () {
                Route::get('list', [OrmawaController::class, 'getList'])->name('list');
                Route::get('', [OrmawaController::class, 'index'])->name('index');
                Route::get('/create', [OrmawaController::class, 'create'])->name('create');
                Route::post('/', [OrmawaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [OrmawaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [OrmawaController::class, 'update'])->name('update');
                Route::post('/hapus', [OrmawaController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'bem', 'as' => 'bem.'], function () {
                Route::get('', [BEMController::class, 'index'])->name('index');
                Route::get('/{id}/edit', [BEMController::class, 'edit'])->name('edit');
                Route::get('/{id}/editpicture', [BEMController::class, 'editpicture'])->name('editpicture');
                Route::put('/{id}', [BEMController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'beasiswa', 'as' => 'beasiswa.'], function () {
                Route::get('list', [BeasiswaController::class, 'getList'])->name('list');
                Route::get('', [BeasiswaController::class, 'index'])->name('index');
                Route::get('/create', [BeasiswaController::class, 'create'])->name('create');
                Route::post('/', [BeasiswaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [BeasiswaController::class, 'edit'])->name('edit');
                Route::put('/{id}', [BeasiswaController::class, 'update'])->name('update');
                Route::post('/hapus', [BeasiswaController::class, 'hapus'])->name('hapus');
            });

            Route::group(['prefix' => 'ikaprodi', 'as' => 'ikaprodi.'], function () {
                Route::get('list', [IkaProdiController::class, 'getList'])->name('list');
                Route::get('', [IkaProdiController::class, 'index'])->name('index');
                Route::get('/create', [IkaProdiController::class, 'create'])->name('create');
                Route::post('/', [IkaProdiController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [IkaProdiController::class, 'edit'])->name('edit');
                Route::put('/{id}', [IkaProdiController::class, 'update'])->name('update');
                Route::post('/hapus', [IkaProdiController::class, 'hapus'])->name('hapus');
            });

            // Route::group(['prefix' => 'prodi', 'as' => 'prodi.'], function () {
            //     Route::get('/list', [ProdiController::class, 'getProdi'])->name('list');
            //     Route::get('/', [ProdiController::class, 'index'])->name('index');
            //     Route::get('/create', [ProdiController::class, 'create'])->name('create');
            //     Route::post('/', [ProdiController::class, 'store'])->name('store');
            //     Route::get('/{id}/edit', [ProdiController::class, 'edit'])->name('edit');
            //     Route::put('/{id}', [ProdiController::class, 'update'])->name('update');
            //     Route::post('/hapus', [ProdiController::class, 'hapus'])->name('hapus');
            // });
        });

        Route::group(['prefix' => 'layanan', 'as' => 'layanan.'], function () {
            Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
                Route::group(['prefix' => 'kalender-akademik', 'as' => 'kalender-akademik.'], function () {
                    Route::get('', [KalenderController::class, 'index'])->name('index');
                    Route::get('/{id}/editKalender', [KalenderController::class, 'editKalender'])->name('editKalender');
                    Route::put('/{id}', [KalenderController::class, 'update'])->name('update');
                });
                Route::group(['prefix' => 'buku-pedoman', 'as' => 'buku-pedoman.'], function () {
                    Route::get('list', [BukuPedomanController::class, 'getBukuPedoman'])->name('list');
                    Route::get('', [BukuPedomanController::class, 'index'])->name('index');
                    Route::get('/create', [BukuPedomanController::class, 'create'])->name('create');
                    Route::post('/', [BukuPedomanController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [BukuPedomanController::class, 'edit'])->name('edit');
                    Route::put('/{id}', [BukuPedomanController::class, 'update'])->name('update');
                    Route::get('/show/{name}', [BukuPedomanController::class, 'show'])->name('show');
                    Route::post('/hapus', [BukuPedomanController::class, 'hapus'])->name('hapus');
                });
            });
            Route::group(['prefix' => 'non-akademik', 'as' => 'non-akademik.'], function () {
                Route::group(['prefix' => 'pinjam-ruang', 'as' => 'pinjam-ruang.'], function () {
                    Route::get('', [PinjamRuangController::class, 'index'])->name('index');
                    Route::get('/{id}/editPinjamRuang', [PinjamRuangController::class, 'editPinjamRuang'])->name('editPinjamRuang');
                    Route::put('/{id}', [PinjamRuangController::class, 'update'])->name('update');
                });
            });
            Route::group(['prefix' => 'fasilitas-kampus', 'as' => 'fasilitas-kampus.'], function () {
                Route::group(['prefix' => 'gedung', 'as' => 'gedung.'], function () {
                    Route::get('list', [FasilitasGedungController::class, 'getListGedung'])->name('list');
                    Route::get('', [FasilitasGedungController::class, 'index'])->name('index');
                    Route::get('/create', [FasilitasGedungController::class, 'create'])->name('create');
                    Route::post('/', [FasilitasGedungController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [FasilitasGedungController::class, 'edit'])->name('edit');
                    Route::put('/{id}', [FasilitasGedungController::class, 'update'])->name('update');
                    Route::post('/hapus', [FasilitasGedungController::class, 'hapus'])->name('hapus');
                });
                Route::group(['prefix' => 'ruang', 'as' => 'ruang.'], function () {
                    Route::get('list', [FasilitasRuangController::class, 'getListRuang'])->name('list');
                    Route::get('lists', [FasilitasRuangController::class, 'getRuang'])->name('lists');
                    Route::get('', [FasilitasRuangController::class, 'index'])->name('index');
                    Route::get('/create', [FasilitasRuangController::class, 'create'])->name('create');
                    Route::get('/creates', [FasilitasRuangController::class, 'creates'])->name('creates');
                    Route::post('/', [FasilitasRuangController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [FasilitasRuangController::class, 'edit'])->name('edit');
                    Route::get('/{id}/edits', [FasilitasRuangController::class, 'edits'])->name('edits');
                    Route::put('/{id}', [FasilitasRuangController::class, 'update'])->name('update');
                    Route::post('/hapus', [FasilitasRuangController::class, 'hapus'])->name('hapus');
                    Route::post('/hapuss', [FasilitasRuangController::class, 'hapuss'])->name('hapuss');
                    Route::group(['prefix' => 'proses', 'as' => 'proses.'], function () {
                        Route::put('/{id}', [FasilitasRuangController::class, 'updates'])->name('updates');
                        Route::post('/', [FasilitasRuangController::class, 'stores'])->name('stores');
                    });
                });
                Route::group(['prefix' => 'laboratorium', 'as' => 'laboratorium.'], function () {
                    Route::get('list', [FasilitasLabController::class, 'getListLab'])->name('list');
                    Route::get('lists', [FasilitasLabController::class, 'getLab'])->name('lists');
                    Route::get('', [FasilitasLabController::class, 'index'])->name('index');
                    Route::get('/create', [FasilitasLabController::class, 'create'])->name('create');
                    Route::get('/creates', [FasilitasLabController::class, 'creates'])->name('creates');
                    Route::post('/', [FasilitasLabController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [FasilitasLabController::class, 'edit'])->name('edit');
                    Route::get('/{id}/edits', [FasilitasLabController::class, 'edits'])->name('edits');
                    Route::put('/{id}', [FasilitasLabController::class, 'update'])->name('update');
                    Route::post('/hapus', [FasilitasLabController::class, 'hapus'])->name('hapus');
                    Route::post('/hapuss', [FasilitasLabController::class, 'hapuss'])->name('hapuss');
                    Route::group(['prefix' => 'proses', 'as' => 'proses.'], function () {
                        Route::put('/{id}', [FasilitasLabController::class, 'updates'])->name('updates');
                        Route::post('/', [FasilitasLabController::class, 'stores'])->name('stores');
                    });
                });
                Route::group(['prefix' => 'lab-lapangan', 'as' => 'lab-lapangan.'], function () {
                    Route::get('list', [FasilitasLapanganController::class, 'getListLap'])->name('list');
                    Route::get('lists', [FasilitasLapanganController::class, 'getLap'])->name('lists');
                    Route::get('', [FasilitasLapanganController::class, 'index'])->name('index');
                    Route::get('/create', [FasilitasLapanganController::class, 'create'])->name('create');
                    Route::get('/creates', [FasilitasLapanganController::class, 'creates'])->name('creates');
                    Route::post('/', [FasilitasLapanganController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [FasilitasLapanganController::class, 'edit'])->name('edit');
                    Route::get('/{id}/edits', [FasilitasLapanganController::class, 'edits'])->name('edits');
                    Route::put('/{id}', [FasilitasLapanganController::class, 'update'])->name('update');
                    Route::post('/hapus', [FasilitasLapanganController::class, 'hapus'])->name('hapus');
                    Route::post('/hapuss', [FasilitasLapanganController::class, 'hapuss'])->name('hapuss');
                    Route::group(['prefix' => 'proses', 'as' => 'proses.'], function () {
                        Route::put('/{id}', [FasilitasLapanganController::class, 'updates'])->name('updates');
                        Route::post('/', [FasilitasLapanganController::class, 'stores'])->name('stores');
                    });
                });
                Route::group(['prefix' => 'uns', 'as' => 'uns.'], function () {
                    Route::get('list', [FasilitasUNSController::class, 'getListUNS'])->name('list');
                    Route::get('', [FasilitasUNSController::class, 'index'])->name('index');
                    Route::get('/create', [FasilitasUNSController::class, 'create'])->name('create');
                    Route::post('/', [FasilitasUNSController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [FasilitasUNSController::class, 'edit'])->name('edit');
                    Route::put('/{id}', [FasilitasUNSController::class, 'update'])->name('update');
                    Route::post('/hapus', [FasilitasUNSController::class, 'hapus'])->name('hapus');
                });
            });
        });
    });
});
