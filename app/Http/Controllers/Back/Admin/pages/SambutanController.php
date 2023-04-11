<?php

namespace App\Http\Controllers\Back\Admin\pages;

use App\Models\Detail_prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;

class SambutanController extends Controller
{
    public function index()
    {
        $prodi_id = Auth::user()->prodi_id;
        $sambutan = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan')->first();
        $namaKaprodi = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-nama')->first();
        $fotoKaprodi = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-foto')->first();
        return view('back.pages.admin.pages.sambutan.index',[
            'sambutan' => $sambutan,
            'nama' => $namaKaprodi,
            'foto' => $fotoKaprodi
        ]);
    }

    public function create()
    {
        return view('back.pages.admin.pages.sambutan.create-edit');
    }

    public function store(Request $request)
    {
        $prodi_id = Auth::user()->prodi_id;

        if (!(Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan')->first())) {
            Detail_prodi::create([
                'prodi_id' => $prodi_id,
                'name' => 'sambutan',
                'value' => ''
            ]);
        }
        if (!(Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan-nama')->first())) {
            Detail_prodi::create([
                'prodi_id' => $prodi_id,
                'name' => 'sambutan-nama',
                'value' => ''
            ]);
        }
        if (!(Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan-foto')->first())) {
            Detail_prodi::create([
                'prodi_id' => $prodi_id,
                'name' => 'sambutan-foto',
                'value' => ''
            ]);
        }

        $dataSambutan = Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan')->first();
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request->sambutan = Purify::config($config)->clean($request->sambutan);

        $dataNama = Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan-nama')->first();

        $dataFoto = Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan-foto')->first();

        $fileName=time().'.'.$request->foto->getClientOriginalName();
        $request->foto->storeAs('images/detailProdi/'.$prodi_id.'/',$fileName, 'public');
        $request->foto = $fileName;

        try {
            $dataSambutan->update([
                'value' => $request->sambutan
            ]);
            $dataNama->update([
                'value' => $request->nama
            ]);
            $dataFoto->update([
                'value' => $request->foto
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.pages.sambutan.index'))->with('success', 'Success saving data!');
    }

    public function edit()
    {
        $prodi_id = Auth::user()->prodi_id;
        $dataNama = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-nama')->firstOrFail();
        $dataFoto = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-foto')->firstOrFail();
        $dataSambutan = Detail_prodi::where('prodi_id', Auth::user()->prodi_id)->where('name', 'sambutan')->firstOrFail();
        return view('back.pages.admin.pages.sambutan.create-edit',[
            'dataSambutan' => $dataSambutan,
            'dataFoto' => $dataFoto,
            'dataNama' => $dataNama,
        ]);
    }

    public function update(Request $request)
    {
        $prodi_id = Auth::user()->prodi_id;
        $dataSambutan = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan')->first();
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request->sambutan = Purify::config($config)->clean($request->sambutan);

        $dataNama = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-nama')->first();

        $dataFoto = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-foto')->first();

        if ($request->foto != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\detailProdi\\' . $prodi_id .'\\'.$dataFoto->value))) {
                File::delete(public_path('storage\images\detailProdi\\' . $prodi_id .'\\'.$dataFoto->value));
            }
            $fileName=time().'.'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('images/detailProdi/'.$prodi_id.'/',$fileName,'public');
            $request->foto = $fileName;
        }

        if ($request->foto == null) {
            $request->foto = $dataFoto['value'];
        }

        try {
            $dataSambutan->update([
                'value' => $request->sambutan
            ]);
            $dataNama->update([
                'value' => $request->nama
            ]);
            $dataFoto->update([
                'value' => $request->foto
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.pages.sambutan.index'))->with('success', 'Success saving data!');

    }

    public function destroy()
    {
        $prodi_id = Auth::user()->prodi_id;
        $dataFoto = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-foto')->first();
        // Delete Image
        if (file_exists(public_path('storage\images\detailProdi\\' . $prodi_id .'\\'.$dataFoto->value))) {
            File::delete(public_path('storage\images\detailProdi\\' . $prodi_id .'\\'.$dataFoto->value));
        }
        $dataFoto->delete();
        $dataNama = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan-nama')->first();
        $dataNama->delete();
        $dataSambutan = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'sambutan')->first();
        $dataSambutan->delete();
        return redirect(route('admin.pages.sambutan.index'))->with('delete', 'Success delete data!');
    }
}
