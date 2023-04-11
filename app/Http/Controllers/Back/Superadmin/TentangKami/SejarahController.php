<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\pages;
use App\Models\page_konten;
use App\Models\konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;

class SejarahController extends Controller
{
    private function checkSejarah(){
        if (!(pages::where('name', 'sejarah')->first())) {
            pages::create([
                'name' => 'sejarah'
            ]);
            konten::create([
                'name' => 'isi-sejarah',
                'value' => '',
            ]);
            $konten = konten::where('name', 'isi-sejarah')->first();
            $kontenId = $konten->id;
            page_konten::create([
                'pages_name' => 'sejarah',
                'konten_id' =>  $kontenId,
            ]);
        }
    }

    public function index()
    {
        $this->checkSejarah();
        $data = page_konten::where('pages_name', 'sejarah')->with('konten')->first();
        return view('back.pages.superadmin.tentangkami.sejarah.index',[
            'data' => $data
        ]);
    }

    public function edit($id)
    {   
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.sejarah.edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        

        $storage = "storage/images";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->value, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = ("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,img[width|height|alt|src|data-filename|style],img[style],span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($dom->saveHTML());

        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.sejarah.index'))->with('success', 'Success saving data!');
    }
}
