<?php

namespace App\Http\Controllers\Back\Superadmin\Produk;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use App\Models\pages;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class ProdukUnggulanController extends Controller
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

        if ($data->name == 'youtube-produk-unggulan') {
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
        return redirect(route('superadmin.produk.produk-unggulan.index'))->with('success', 'Success saving data!');
    }

    public function index()
    {
        $deskripsi = $this->deskripsi();
        $youtube = $this->youtube();
        return view('back.pages.superadmin.produk.produk-unggulan.index',[
            'deskripsi' => $deskripsi,
            'youtube' => $youtube,
        ]);
    }

    private function deskripsi()
    {
        // dd((pages::where('name', 'produk-unggulan')->first()) === null);
        if ((pages::where('name', 'produk-unggulan')->first()) == null) {
            pages::create([
                'name' => 'produk-unggulan'
            ]);


            konten::create([
                'name' => 'deskripsi-produk-unggulan',
                'value' => ''
            ]);
            $iddeskripsi = konten::where('name', 'deskripsi-produk-unggulan')->first()->id;
            page_konten::create([
                'pages_name' => 'produk-unggulan',
                'konten_id' => $iddeskripsi
            ]);
            
            konten::create([
                'name' => 'youtube-produk-unggulan',
                'value' => ''
            ]);
            $idyoutube = konten::where('name', 'youtube-produk-unggulan')->first()->id;
            page_konten::create([
                'pages_name' => 'produk-unggulan',
                'konten_id' => $idyoutube
            ]);
        }
        $deskId = konten::where('name', 'deskripsi-produk-unggulan')->first()->id;
        return page_konten::where('pages_name', 'produk-unggulan')->where('konten_id', $deskId)->with('konten')->first();
    }

    private function youtube()
    {
        $youtubeBerandaId = konten::where('name', 'youtube-produk-unggulan')->first()->id;
        return page_konten::where('pages_name', 'produk-unggulan')->where('konten_id', $youtubeBerandaId)->with('konten')->first();
    }

    public function profileEdit($id)
    {
        $view = 'back.pages.superadmin.produk.produk-unggulan.edit';
        return $this->editData($id, $view);
    }

    public function profileUpdate(Request $request, $id)
    {
        return $this->updateData($request, $id);
    }

    public function editYoutube($id)
    {
        $data = konten::findOrFail($id);
        return view('back.pages.superadmin.produk.produk-unggulan.editYoutube', [
            'data' => $data
        ]);
    }
}
