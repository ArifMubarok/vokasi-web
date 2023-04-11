<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\pages;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;

class VisiMisiTujuanController extends Controller
{
    public function index()
    {
        $gambar = konten::where('name', 'gambar-visi,misi&tujuan')->first();
        $visi = konten::where('name', 'Visi')->first();
        $misi = konten::where('name', 'Misi')->first();
        $tujuan = konten::where('name', 'Tujuan')->first();
        $strategi = konten::where('name', 'Strategi Pencapaian Visi, Misi, dan Tujuan')->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.index',[
            'visi' => $visi,
            'misi' => $misi,
            'tujuan' => $tujuan,
            'strategi' => $strategi,
            'gambar' => $gambar
        ]);
    }

    public function visiEdit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.visi.edit',[
            'data' => $data
        ]);
    }
    
    public function visiUpdate(Request $request, $id)
    {
        $data = konten::findOrFail($id);

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.visi-misi-tujuan.index'))->with('success', 'Success saving data!');
    }
    public function misiEdit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.misi.edit',[
            'data' => $data
        ]);
    }
    
    public function misiUpdate(Request $request, $id)
    {
        $data = konten::findOrFail($id);

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.visi-misi-tujuan.index'))->with('success', 'Success saving data!');
    }
    public function tujuanEdit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.tujuan.edit',[
            'data' => $data
        ]);
    }
    
    public function tujuanUpdate(Request $request, $id)
    {
        $data = konten::findOrFail($id);

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.visi-misi-tujuan.index'))->with('success', 'Success saving data!');
    }
    public function strategiEdit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.strategi.edit',[
            'data' => $data
        ]);
    }
    
    public function strategiUpdate(Request $request, $id)
    {
        $data = konten::findOrFail($id);

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $data->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.visi-misi-tujuan.index'))->with('success', 'Success saving data!');
    }

    public function gambarEdit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.visimisitujuan.gambar.edit',[
            'data' => $data
        ]);
    }

    public function gambarUpdate(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        if ($request->value != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/images/visi-misi-tujuan/' . $data->value))) {
                File::delete(public_path('storage/images/visi-misi-tujuan/' . $data->value));
            }
            $fileName = time() . '.' . $request->value->getClientOriginalName();
            $request->value->storeAs('images/visi-misi-tujuan/', $fileName, 'public');
            $request->value = $fileName;
        }

        if ($request->value == null) {
            $request->value = $data->value;
        }
        try {
            $data->update([
                'value' => $request->value
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.visi-misi-tujuan.index'))->with('success', 'Success saving data!');
    }
}
