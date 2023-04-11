<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use App\Models\produkUnggulan as ModelsProdukUnggulan;

class ProdukUnggulan extends Controller
{
    public function index()
    {
        $desk = konten::where('name', 'deskripsi-produk-unggulan')->first();
        $yout = konten::where('name', 'youtube-produk-unggulan')->first();
        $data = ModelsProdukUnggulan::get();
        return view('front.produk.produk-unggulan', [
            'desk' => $desk,
            'yout' => $yout,
            'data' => $data
        ]);
    }
}
