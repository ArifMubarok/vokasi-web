<?php

namespace Database\Seeders;

use App\Models\role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::create([
            'name' => 'Super Admin'
        ]);
        role::create([
            'name' => 'Admin'
        ]);
        role::create([
            'name' => 'Humas'
        ]);
        role::create([
            'name' => 'Translator'
        ]);

        User::create([
            'name' => 'superadmin',
            'role_id' => 1,
            'email' => 'su@su.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => Str::of('admin')->title(),
            'role_id' => 2,
            'prodi_id' => 1,
            'email' => 'adminti@adminti.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'admin',
            'role_id' => 2,
            'prodi_id' => 2,
            'email' => 'adminkes@adminkes.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'humas',
            'role_id' => 3,
            'email' => 'humas@humas.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'translator',
            'role_id' => 4,
            'email' => 'translator@translator.com',
            'password' => Hash::make('password'),
        ]);
    }
}
