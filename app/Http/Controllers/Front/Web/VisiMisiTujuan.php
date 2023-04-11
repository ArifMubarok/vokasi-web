<?php

namespace App\Http\Controllers\Front\Web;

use App\Models\konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiTujuan extends Controller
{
    public function index()
    {
        $gambar = konten::where('name', 'gambar-visi,misi&tujuan')->first();
        $visi = konten::where('name', 'Visi')->first();
        $misi = konten::where('name', 'Misi')->first();
        $tujuan = konten::where('name', 'Tujuan')->first();
        $strategi = konten::where('name', 'Strategi Pencapaian Visi, Misi, dan Tujuan')->first();
        return view('front.tentang-kami.visi-misi-tujuan',[
            'visi' => $visi,
            'misi' => $misi,
            'tujuan' => $tujuan,
            'strategi' => $strategi,
            'gambar' => $gambar
        ]);
    }
}
