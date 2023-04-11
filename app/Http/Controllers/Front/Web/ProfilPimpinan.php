<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\profilPimpinan as ModelsProfilPimpinan;
use Illuminate\Http\Request;

class ProfilPimpinan extends Controller
{
    public function index()
    {
        $dekan = ModelsProfilPimpinan::where('title', 1)->get();
        $senat = ModelsProfilPimpinan::where('title', 2)->get();
        $koordinator = ModelsProfilPimpinan::where('title', 3)->get();
        $penjamin = ModelsProfilPimpinan::where('title', 4)->get();
        $lain = ModelsProfilPimpinan::where('title', 5)->get();
        $labor = ModelsProfilPimpinan::where('title', 6)->get();
        return view('front.tentang-kami.profil-pimpinan', [
            'dekan' => $dekan,
            'senat' => $senat,
            'koordinator' => $koordinator,
            'penjamin' => $penjamin,
            'lain' => $lain,
            'labor' => $labor,
        ]);
    }
}
