<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung;

use App\Models\konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\page_konten;
use App\Models\pages;
use Stevebauman\Purify\Facades\Purify;

class BPUController extends Controller
{
    public function index()
    {
        $isibpu = konten::where('name', 'isi-bpu')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.bpu.index', [
            'isibpu' => $isibpu,
        ]);
    }

    public function create()
    {
        pages::create([
            'name' => 'bpu-sv'
        ]);

        konten::create([
            'name' => 'isi-bpu',
            'value' => '',
        ]);

        $konten = konten::where('name', 'isi-bpu')->first();
        $idkonten = $konten->id;
        page_konten::create([
            'pages_name' => 'bpu-sv',
            'konten_id' => $idkonten,
        ]);
        
        return redirect(route('superadmin.tentangkami.unit-pendukung.BPU.edit'));
    }

    public function edit()
    {
        $konten = konten::where('name', 'isi-bpu')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.bpu.create-edit', [
            'data' => $konten
        ]);
    }

    public function update(Request $request)
    {
        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $konten = konten::where('name', 'isi-bpu')->first();
            $konten->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.unit-pendukung.BPU.index'))->with('success', 'Success saving data!');
    }
}
