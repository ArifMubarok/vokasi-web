<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\fasilitasLab as ModelsFasilitasLab;
use App\Models\Laboratorium;
use Illuminate\Http\Request;

class fasilitasLab extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Laboratorium::get();
        $foto_lab = ModelsFasilitasLab::with('lab')->get();
        return view('front.layanan.fasilitas-kampus.laboratorium', [
            'foto_lab' => $foto_lab,
            'lab' => $lab,
        ]);
    }
}