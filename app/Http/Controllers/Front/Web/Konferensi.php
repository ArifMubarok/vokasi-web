<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konferensi as ModelsKonferensi;

class Konferensi extends Controller
{
    public function index()
    {
        $data = ModelsKonferensi::latest()->get();
        return view('front.produk.konferensi', [
            'data' => $data,
        ]);
    }
}
