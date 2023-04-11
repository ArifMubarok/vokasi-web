<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use Illuminate\Http\Request;

class bem extends Controller
{
    public function index()
    {
        $isiprofile= konten::where('name', 'isi-bem')->first();
        $pictureprofile = konten::where('name', 'foto-bem')->first();
        return view('front.mahasiswa.badan-eksekutif-mahasiswa', [
            'isiprofile' => $isiprofile,
            'pictureprofile' => $pictureprofile,
        ]);
    }
}
