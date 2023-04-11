<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use App\Models\pages;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class CDCControlller extends Controller
{
    public function index()
    {
        $isicdc = konten::where('name', 'isi-cdc')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.cdc.index', [
            'isicdc' => $isicdc,
        ]);
    }

    public function create()
    {
        pages::create([
            'name' => 'cdc-sv'
        ]);

        konten::create([
            'name' => 'isi-cdc',
            'value' => '',
        ]);

        $konten = konten::where('name', 'isi-cdc')->first();
        $idkonten = $konten->id;
        page_konten::create([
            'pages_name' => 'cdc-sv',
            'konten_id' => $idkonten,
        ]);
        
        return redirect(route('superadmin.tentangkami.unit-pendukung.CDC.edit'));
    }

    public function edit()
    {
        $konten = konten::where('name', 'isi-cdc')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.cdc.create-edit', [
            'data' => $konten
        ]);
    }

    public function update(Request $request)
    {
        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $konten = konten::where('name', 'isi-cdc')->first();
            $konten->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.unit-pendukung.CDC.index'))->with('success', 'Success saving data!');
    }
}
