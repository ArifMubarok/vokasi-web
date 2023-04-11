<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\fasilitasUNS as ModelsFasilitasUNS;
use Illuminate\Http\Request;

class fasilitasUNS extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelsFasilitasUNS::latest()->get();
        return view('front.layanan.fasilitas-kampus.uns', [
            'data' => $data,
        ]);
    }
}