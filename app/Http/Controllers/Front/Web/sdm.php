<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\sdm as ModelsSdm;
use Illuminate\Http\Request;

class sdm extends Controller
{
    public function index()
    {
        $sdm = ModelsSdm::get();
        return view('front.tentang-kami.sumber-daya-manusia',[
            'sdm' => $sdm
        ]);
    }
}
