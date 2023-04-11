<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\IkaprodiModel;
use Illuminate\Http\Request;

class ikaprodi extends Controller
{
    public function index()
    {
        $data = IkaprodiModel::latest()->with('prodi')->get();
        return view('front.mahasiswa.alumni.ikaprodi', [
            'data' => $data
        ]);
    }
}
