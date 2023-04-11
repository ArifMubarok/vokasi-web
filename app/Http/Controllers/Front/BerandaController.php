<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\InfoPenting;
use App\Models\Kerjasama;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $kerjasama = Kerjasama::get();
        $berita = BeritaModel::latest()->limit(3)->get();
        // dd($berita);
        $profile = page_konten::where('pages_name', 'beranda')->with('konten')->first();
        $youtube = $this->youtube();
        $visi = $this->visi();
        $misi = $this->misi();
        $tujuan1 = $this->tujuan1();
        $tujuan2 = $this->tujuan2();
        $tujuan3 = $this->tujuan3();
        $pmb_uns = InfoPenting::first();
        return view('front.beranda.index', [
            'pmb_uns' => $pmb_uns,
            'kerjasamas' => $kerjasama,
            'beritas' => $berita,
            'profile' => $profile,
            'youtube' => $youtube,
            'visi' => $visi,
            'misi' => $misi,
            'tujuan1' => $tujuan1,
            'tujuan2' => $tujuan2,
            'tujuan3' => $tujuan3,
        ]);
    }

    private function youtube()
    {
        $youtubeBerandaId = konten::where('name', 'beranda-profil-youtube')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $youtubeBerandaId)->with('konten')->first();
    }

    private function visi()
    {
        $visiBerandaId = konten::where('name', 'beranda-visi')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $visiBerandaId)->with('konten')->first();
    }

    private function misi()
    {
        $misiBerandaId = konten::where('name', 'beranda-misi')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $misiBerandaId)->with('konten')->first();
    }

    private function tujuan1()
    {
        $tujuanBerandaId = konten::where('name', 'beranda-tujuan1')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $tujuanBerandaId)->with('konten')->first();
    }

    private function tujuan2()
    {
        $tujuanBerandaId = konten::where('name', 'beranda-tujuan2')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $tujuanBerandaId)->with('konten')->first();
    }

    private function tujuan3()
    {
        $tujuanBerandaId = konten::where('name', 'beranda-tujuan3')->first()->id;
        return page_konten::where('pages_name', 'beranda')->where('konten_id', $tujuanBerandaId)->with('konten')->first();
    }
}