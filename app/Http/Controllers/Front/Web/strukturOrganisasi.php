<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use Illuminate\Http\Request;

class strukturOrganisasi extends Controller
{
    public function index()
    {
        $data = konten::where('name', 'struktur-organisasi')->first();
        return view('front.tentang-kami.struktur-organisasi', [
            'data' => $data
        ]);
    }
}
