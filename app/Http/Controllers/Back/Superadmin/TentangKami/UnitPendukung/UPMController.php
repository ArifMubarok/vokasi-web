<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami\UnitPendukung;

use App\Models\pages;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use App\Models\profilPimpinan;
use App\Http\Controllers\Controller;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class UPMController extends Controller
{
    public function index()
    {
        $isiupm = konten::where('name', 'isi-upm')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.upm.index', [
            'isiupm' => $isiupm,
        ]);
    }

    public function getMutu(Request $request)
    {
        if ($request->ajax()) {
            $data = profilPimpinan::where('title', 4)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.profil-pimpinan.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function($row){
                    $url= asset('storage/images/profil-pimpinan/'.$row->foto);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'profil', 'foto'])
                ->make(true);
        }
    }

    public function create()
    {
        pages::create([
            'name' => 'upm-sv'
        ]);

        konten::create([
            'name' => 'isi-upm',
            'value' => '',
        ]);

        $konten = konten::where('name', 'isi-upm')->first();
        $idkonten = $konten->id;
        page_konten::create([
            'pages_name' => 'upm-sv',
            'konten_id' => $idkonten,
        ]);
        
        return redirect(route('superadmin.tentangkami.unit-pendukung.UPM.edit'));
    }

    public function edit()
    {
        $konten = konten::where('name', 'isi-upm')->first();
        return view('back.pages.superadmin.tentangkami.unitpendukung.upm.create-edit', [
            'data' => $konten
        ]);
    }

    public function update(Request $request)
    {
        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value']=Purify::config($config)->clean($request->value);

        try {
            $konten = konten::where('name', 'isi-upm')->first();
            $konten->update($request->only([
                'value'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.unit-pendukung.UPM.index'))->with('success', 'Success saving data!');
    }
}
