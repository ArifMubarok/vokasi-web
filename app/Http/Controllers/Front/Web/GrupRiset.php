<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\GrupRisetModel;
use Illuminate\Http\Request;

class GrupRiset extends Controller
{
    public function index()
    {
        $data = GrupRisetModel::with('prodi')->get();
        return view('front.produk.grup-riset', [
            'data' => $data
        ]);
    }
}
