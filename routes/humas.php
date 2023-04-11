<?php

use App\Http\Controllers\Back\Humas\ManajemenBerita\BeritaController;
use App\Http\Controllers\Back\Humas\ManajemenBerita\InfoPentingController;
use App\Http\Controllers\Back\Humas\ManajemenBerita\KategoriController;
use App\Http\Controllers\Back\Humas\ManajemenKerjasamaController;
use App\Http\Controllers\Back\Humas\ManajemenMitraController;
use App\Http\Controllers\humas\ValidasiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'humas', 'as' => 'humas.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'validasi', 'as' => 'validasi.'], function () {
        Route::get('/list', [ValidasiController::class, 'getList'])->name('list');
        Route::get('/', [ValidasiController::class, 'index'])->name('index');
        Route::get('/show/{id}', [ValidasiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ValidasiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ValidasiController::class, 'update'])->name('update');
        Route::post('/hapus', [ValidasiController::class, 'hapus'])->name('hapus');
    });
    Route::group(['prefix' => 'manajemen-berita', 'as' => 'manajemen-berita.'], function () {
        Route::group(['prefix' => 'berita', 'as' => 'berita.'], function () {
            Route::get('/list', [BeritaController::class, 'getBerita'])->name('list');
            Route::get('/', [BeritaController::class, 'index'])->name('index');
            Route::get('/show/{id}', [BeritaController::class, 'show'])->name('show');
            Route::get('/create', [BeritaController::class, 'create'])->name('create');
            Route::post('/', [BeritaController::class, 'store'])->name('store');
            Route::post('/publish', [BeritaController::class, 'publish'])->name('publish');
            Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BeritaController::class, 'update'])->name('update');
            Route::post('/hapus', [BeritaController::class, 'hapus'])->name('hapus');
        });
        Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
            Route::get('/list', [KategoriController::class, 'getKategori'])->name('list');
            Route::get('/', [KategoriController::class, 'index'])->name('index');
            Route::get('/create', [KategoriController::class, 'create'])->name('create');
            Route::post('/', [KategoriController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
            Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
            Route::post('/hapus', [KategoriController::class, 'hapus'])->name('hapus');
        });
        Route::group(['prefix' => 'info-penting', 'as' => 'info-penting.'], function () {
            Route::get('/list', [InfoPentingController::class, 'getInfo'])->name('list');
            Route::get('/', [InfoPentingController::class, 'index'])->name('index');
            Route::get('/create', [InfoPentingController::class, 'create'])->name('create');
            Route::post('/', [InfoPentingController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [InfoPentingController::class, 'edit'])->name('edit');
            Route::put('/{id}', [InfoPentingController::class, 'update'])->name('update');
            // Route::post('/hapus', [InfoPentingController::class, 'hapus'])->name('hapus');
        });
    });

    // Route::group(['prefix' => 'manajemen-kerjasama', 'as' => 'manajemen-kerjasama.'], function () {
    //     Route::get('/list', [ManajemenMitraController::class, 'getKerjasama'])->name('list');
    //     Route::get('/', [ManajemenMitraController::class, 'index'])->name('index');
    //     Route::get('/create', [ManajemenMitraController::class, 'create'])->name('create');
    //     Route::post('/', [ManajemenMitraController::class, 'store'])->name('store');
    //     Route::get('/{id}/edit', [ManajemenMitraController::class, 'edit'])->name('edit');
    //     Route::put('/{id}', [ManajemenMitraController::class, 'update'])->name('update');
    //     Route::post('/hapus', [ManajemenMitraController::class, 'hapus'])->name('hapus');
    // });
});