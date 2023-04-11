<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use Illuminate\Http\Request;

class CDC extends Controller
{
    public function index()
    {
        $isicdc = konten::where('name', 'isi-cdc')->first();
        return view('front.tentang-kami.unit-pendukung.CDC', [
            'isicdc' => $isicdc,
        ]);
    }
}
