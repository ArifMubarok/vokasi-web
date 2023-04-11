<?php

namespace Database\Seeders;

use App\Models\Detail_prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail_prodi::create([
            'prodi_id' => 1
        ]);
        Detail_prodi::create([
            'prodi_id' => 2
        ]);
    }
}
