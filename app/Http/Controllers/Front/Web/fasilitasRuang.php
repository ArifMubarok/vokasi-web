<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\fasilitasRuang as ModelsFasilitasRuang;
use App\Models\Ruang;
use Illuminate\Http\Request;

class fasilitasRuang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelsFasilitasRuang::with('ruang')->get();
        $ruang = Ruang::get();
        return view('front.layanan.fasilitas-kampus.ruang', [
            'data' => $data,
            'ruang' => $ruang,
        ]);
    }
}