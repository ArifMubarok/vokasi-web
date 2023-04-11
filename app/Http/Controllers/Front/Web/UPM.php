<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\profilPimpinan;
use Illuminate\Http\Request;

class UPM extends Controller
{
    public function index()
    {
        $isiupm = konten::where('name', 'isi-upm')->first();
        $profil = profilPimpinan::where('title', 4)-> get();
        // dd($isiupm);
        return view('front.tentang-kami.unit-pendukung.UPM-SV', [
            'isiupm' => $isiupm,
            'profil' => $profil
        ]);
    }
}
