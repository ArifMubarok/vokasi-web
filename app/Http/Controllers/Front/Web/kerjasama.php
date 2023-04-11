<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\kerjasama as ModelsKerjasama;
use App\Models\konten;
use Illuminate\Http\Request;

class kerjasama extends Controller
{
    public function index()
    {
        $data = ModelsKerjasama::get();
        $gambar = konten::where('name', 'gambar-kerjasama')->first();
        $link = konten::where('name', 'link-kerjasama')->first();
        $deskripsi = konten::where('name', 'deskripsi-kerjasama')->first();
        return view('front.tentang-kami.kerjasama', [
            'data' => $data,
            'gambar' => $gambar,
            'link' => $link,
            'deskripsi' => $deskripsi
        ]);
    }
}
