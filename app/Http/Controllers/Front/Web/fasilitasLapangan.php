<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\fasilitasLab_Lapangan;
use App\Models\Lab_lapangan;
use Illuminate\Http\Request;

class fasilitasLapangan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = fasilitasLab_Lapangan::with('lap')->get();
        $lab_lapangan = Lab_lapangan::get();
        return view('front.layanan.fasilitas-kampus.laboratorium-lapangan', [
            'data' => $data,
            'lab_lapangan' => $lab_lapangan,
        ]);
    }
}