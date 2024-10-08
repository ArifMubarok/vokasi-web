<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'name' => 'Penelitian'
        ]);
        Kategori::create([
            'name' => 'Pengabdian'
        ]);
        Kategori::create([
            'name' => 'Kegiatan Mahasiswa'
        ]);
        Kategori::create([
            'name' => 'Kerjasama'
        ]);
        Kategori::create([
            'name' => 'MBKM'
        ]);
    }
}
