<?php

namespace App\Http\Controllers\Front\Web;

use App\Models\daftarSenat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SenatAkademikFakultas extends Controller
{
    public function index()
    {
        $senat = daftarSenat::where('badanSenat', 'senat')->get();
        $komisiA = daftarSenat::where('badanSenat', 'komisiA')->get();
        $komisiB = daftarSenat::where('badanSenat', 'komisiB')->get();
        $komisiC = daftarSenat::where('badanSenat', 'komisiC')->get();
        return view('front.tentang-kami.senat-akademik-fakultas', [
            'senat' => $senat,
            'komisiA' => $komisiA,
            'komisiB' => $komisiB,
            'komisiC' => $komisiC,
        ]);
    }
}
