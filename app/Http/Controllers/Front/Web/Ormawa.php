<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrmawaModel;

class Ormawa extends Controller
{
    public function index()
    {
        $data = OrmawaModel::get();
        return view('front.mahasiswa.ormawa',[
            'data' => $data
        ]);
    }
}
