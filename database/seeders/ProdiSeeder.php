<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Tingkat_prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tingkat_prodi::create([
            'tingkat' => 1
        ]);
        Tingkat_prodi::create([
            'tingkat' => 2
        ]);
        Tingkat_prodi::create([
            'tingkat' => 3
        ]);
        Tingkat_prodi::create([
            'tingkat' => 4
        ]);

        Prodi::create([
            'name' => 'Teknik Informatika',
            'slug' => 'd3-teknik-informatika',
            'tingkat' => 3,
            'isActive' => 1,
        ]);
        Prodi::create([
            'name' => 'Keselamatan dan Kesehatan Kerja',
            'slug' => 'd4-k3',
            'tingkat' => 4,
            'isActive' => 1,
        ]);
    }
}
