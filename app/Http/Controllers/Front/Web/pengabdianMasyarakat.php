<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use Illuminate\Http\Request;

class pengabdianMasyarakat extends Controller
{
    public function index()
    {
        // dd(BeritaModel::with('berita_kategori.kategori:id,name')->latest()->first()->berita_kategori->pluck('kategori')->toArray());

        $data = BeritaModel::with('berita_kategori.kategori:id,name', 'prodi:id,name')->where('isValidate', '1')->where('status', '1')->latest()->get();

        $value = array();
        foreach ($data as $item ) {
            if ($item->berita_kategori[0]->kategori->name == "Pengabdian") {
                array_push($value, $item);
            }
        }
        // dd($value[0]);
        return view('front.produk.pengabdian-masyarakat', [
            'data' => $value
        ]);
    }
}
