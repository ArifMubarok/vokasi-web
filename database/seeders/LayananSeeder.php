<?php

namespace Database\Seeders;

use App\Models\konten;
use App\Models\Lab_lapangan;
use App\Models\Laboratorium;
use App\Models\page_konten;
use App\Models\pages;
use App\Models\Ruang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pages::create([
        //     'name' => 'akademik'
        // ]);
        // konten::create([
        //     'name' => 'kalender-akademik',
        //     'value' => ''
        // ]);
        // $kalender = konten::where('name', 'kalender-akademik')->first();
        // $kalenderId = $kalender->id;
        // page_konten::create([
        //     'pages_name' => 'akademik',
        //     'konten_id' => $kalenderId
        // ]);
        // pages::create([
        //     'name' => 'pinjam-ruang',
        // ]);
        // konten::create([
        //     'name' => 'pinjam-ruang',
        //     'value' => '',
        // ]);
        // $pinjam_ruang = konten::where('name', 'pinjam-ruang')->first();
        // $pinjam_ruangId = $pinjam_ruang->id;
        // page_konten::create([
        //     'pages_name' => 'pinjam-ruang',
        //     'konten_id' => $pinjam_ruangId
        // ]);

        // Ruang::create([
        //     'name' => 'Kelas',
        //     'deskripsi' => 'Kelas',
        // ]);
        // Ruang::create([
        //     'name' => 'Meeting SV Kecil',
        //     'deskripsi' => 'Meeting',
        // ]);
        // Ruang::create([
        //     'name' => 'Meeting Bisnis',
        //     'deskripsi' => 'untuk Rapat',
        // ]);

        // Laboratorium::create([
        //     'name' => 'Mixed Reality',
        //     'deskripsi' => 'Mix',
        // ]);
        // Laboratorium::create([
        //     'name' => 'Adminduk',
        //     'deskripsi' => 'adminduk',
        // ]);

        Lab_lapangan::create([
            'name' => 'test',
            'deskripsi' => 'test',
        ]);
        Lab_lapangan::create([
            'name' => 'test1',
            'deskripsi' => 'test1',
        ]);
    }
}