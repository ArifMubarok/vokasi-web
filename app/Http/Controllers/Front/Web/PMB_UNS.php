<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\InfoPenting;
use Illuminate\Http\Request;

class PMB_UNS extends Controller
{
    public function index()
    {
        $data = InfoPenting::first();
        return view('front.beranda.pmb_uns.index', [
            'data' => $data
        ]);
    }

    public function show($slug)
    {
        // $data = BeritaModel::where('slug', $slug)->first();
        // $berita = BeritaModel::latest()->limit(3)->get();
        // return view('front.berita.show', [
        //     'data' => $data,
        //     'berita' => $berita
        // ]);
    }
}