<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;

class beritaController extends Controller
{
    public function index()
    {
        $berita = BeritaModel::latest()->get();
        return view('front.berita.all', [
            'berita' => $berita
        ]);
    }

    public function show($slug)
    {
        $data = BeritaModel::where('slug', $slug)->first();
        $berita = BeritaModel::latest()->limit(3)->get();
        return view('front.berita.show', [
            'data' => $data,
            'berita' => $berita
        ]);
    }
}
