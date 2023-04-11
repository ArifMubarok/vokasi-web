<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use App\Models\profilsambutan;
use Illuminate\Http\Request;

class ProfilSV extends Controller
{
    public function index()
    {
        $isiprofile= konten::where('name', 'isi-profil')->first();
        $pictureprofile = konten::where('name', 'picture-profil')->first();
        $sambutan = profilsambutan::first();
        return view('front.tentang-kami.profil', [
            'isiprofile' => $isiprofile,
            'pictureprofile' => $pictureprofile,
            'sambutan' => $sambutan
        ]);
    }
}
