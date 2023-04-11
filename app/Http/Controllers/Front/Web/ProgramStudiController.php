<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\Detail_prodi;
use App\Models\informasi_prodi;
use App\Models\Prodi;
use App\Models\produkUnggulan;
use App\Models\Sdm_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramStudiController extends Controller
{

    public function index()
    {
        $prodi = Prodi::where('isActive', 1)->orderBy('tingkat', 'desc')->get();
        return view('front.program-studi.index', [
            'prodis' => $prodi,
        ]);
    }

    public function show($slug)
    {
        $prodi = Prodi::where('slug', $slug)->firstOrFail(['id', 'name']);
        $tingkatProdi = strtok($slug, '-');
        $head = $tingkatProdi . ' ' . $prodi->name;
        $isInformasi = informasi_prodi::where('prodi_id', $prodi->id)->first();
        $informasi = informasi_prodi::where('prodi_id', $prodi->id)->get();
        $link = "";
        foreach ($informasi as $data) {
            if ($data->header == "Link") {
                $link = $data;
            }
        }

        $sambutan = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'sambutan')->first();
        $namaKaprodi = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'sambutan-nama')->first();
        $fotoKaprodi = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'sambutan-foto')->first();
        $gambaran = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'gambaran-umum')->first();
        $keunggulan = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'keunggulan')->first();
        $vmt = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'visi-misi-tujuan')->first();
        $profil = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'profil-lulusan')->first();
        $fasilitas = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'fasilitas')->first();
        $labor = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'laboratorium')->first();
        $kerjasama = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'kerjasama')->first();
        $testimoni = Detail_prodi::where('prodi_id', $prodi->id)->where('name', 'testimoni')->first();
        $isDosen = Sdm_prodi::where('prodi_id', $prodi->id)->where('posisi', 'dosen')->first();
        $isAdmin = Sdm_prodi::where('prodi_id', $prodi->id)->where('posisi', 'admin')->first();
        $dosen = Sdm_prodi::where('prodi_id', $prodi->id)->where('posisi', 'dosen')->get();
        $admin = Sdm_prodi::where('prodi_id', $prodi->id)->where('posisi', 'admin')->get();
        $isProduk = produkUnggulan::where('prodi_id', $prodi->id)->first();
        $produk = produkUnggulan::where('prodi_id', $prodi->id)->get();


        return view('front.program-studi.detail', [
            'slug' => $slug,
            'head' => $head,
            'isInformasi' => $isInformasi,
            'informasi' => $informasi,
            'sambutan' => $sambutan,
            'nama' => $namaKaprodi,
            'foto' => $fotoKaprodi,
            'gambaran' => $gambaran,
            'keunggulan' => $keunggulan,
            'vmt' => $vmt,
            'profil' => $profil,
            'fasilitas' => $fasilitas,
            'laboratorium' => $labor,
            'kerjasama' => $kerjasama,
            'testimoni' => $testimoni,
            'isDosen' => $isDosen,
            'isAdmin' => $isAdmin,
            'dosen' => $dosen,
            'admin' => $admin,
            'link' => $link,
            'isProduk' => $isProduk,
            'produk' => $produk
        ]);
    }

    public function produk($slug, $produk)
    {
        $isLeaflet = produkUnggulan::where('produk', $produk)->first();
        $leaflet = produkUnggulan::where('produk', $produk)->get();
        return view('front.program-studi.produk-prodi.show', [
            'isLeaflet' => $isLeaflet,
            'leaflet' => $leaflet
        ]);
    }
}
