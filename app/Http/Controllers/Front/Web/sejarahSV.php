<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use Illuminate\Http\Request;

class sejarahSV extends Controller
{
    public function index()
    {
        $data = konten::where('name', 'isi-sejarah')->firstOrFail();
        return view('front.tentang-kami.sejarah-perkembangan', [
            'data' => $data
        ]);
    }
}
