<?php

namespace App\Http\Controllers\Back\Superadmin;

use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Purify\Facades\Purify;

class BerandaController extends Controller
{

    public function editData($id, $view)
    {
        $data = konten::where('id', $id)->first();
        return view($view,[
            'data' => $data
        ]);
    }

    public function updateData($request, $id)
    {
        $data = konten::findOrFail($id);
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style],iframe[src]'];
        $request['value']=Purify::config($config)->clean($request['value']);

        if ($data->name == 'beranda-profil-youtube') {
            function get_string_between($string, $start, $end){
                $string = ' ' . $string;
                $ini = strpos($string, $start);
                if ($ini == 0) return '';
                $ini += strlen($start);
                $len = strpos($string, $end, $ini) - $ini;
                return substr($string, $ini, $len);
            }
    
            $parsed = get_string_between($request->value, '"', '"');
            $request['value'] = $parsed;
        }


        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.beranda.index'))->with('success', 'Success saving data!');
    }

    public function index()
    {
        $profile = page_konten::where('pages_name', 'beranda')->with('konten')->first();
        $youtube = $this->youtube();
        $visi = $this->visi();
        $misi = $this->misi();
        $tujuan1 = $this->tujuan1(); 
        $tujuan2 = $this->tujuan2(); 
        $tujuan3 = $this->tujuan3(); 
        return view('back.pages.superadmin.beranda.index',[
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

    public function profileEdit($id)
    {
        $view = 'back.pages.superadmin.beranda.edit';
        return $this->editData($id, $view);
    }

    public function profileUpdate(Request $request, $id)
    {
        return $this->updateData($request, $id);
    }

    public function editYoutube($id)
    {
        $data = konten::findOrFail($id);
        return view('back.pages.superadmin.beranda.editYoutube', [
            'data' => $data
        ]);
    }
}