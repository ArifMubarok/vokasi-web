<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\akreditasi as ModelsAkreditasi;

class akreditasi extends Controller
{
    public function index()
    {
        $data = ModelsAkreditasi::get();
        return view('front.tentang-kami.akreditasi', [
            'data' => $data
        ]);
    }
}
