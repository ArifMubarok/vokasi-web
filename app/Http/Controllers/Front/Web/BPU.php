<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use Illuminate\Http\Request;

class BPU extends Controller
{
    public function index()
    {
        $isibpu = konten::where('name', 'isi-bpu')->first();
        return view('front.tentang-kami.unit-pendukung.BPU-SV', [
            'isibpu' => $isibpu
        ]);
    }
}
