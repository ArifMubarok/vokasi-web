<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BukuDanModul as ModelsBukuDanModul;

class BukudanModul extends Controller
{
    public function index()
    {
        $data = ModelsBukuDanModul::latest()->get();
        return view('front.produk.buku-dan-modul', [
            'data' => $data
        ]);
    }
}
