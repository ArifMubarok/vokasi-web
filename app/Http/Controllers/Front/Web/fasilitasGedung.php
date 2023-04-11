<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\fasilitasGedung as ModelsFasilitasGedung;
use Illuminate\Http\Request;

class fasilitasGedung extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelsFasilitasGedung::latest()->get();
        return view('front.layanan.fasilitas-kampus.gedung', [
            'data' => $data,
        ]);
    }
}