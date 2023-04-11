<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;

class PenelitianDosen extends Controller
{
    public function index()
    {
        $data = BeritaModel::with('berita_kategori.kategori:id,name', 'prodi:id,name')->where('isValidate', '1')->where('status', '1')->latest()->get();

        $value = array();
        foreach ($data as $item ) {
            if ($item->berita_kategori[0]->kategori->name == "Penelitian") {
                array_push($value, $item);
            }
        }
        return view('front.produk.penelitian-dosen', [
            'data' => $value
        ]);
    }
}
