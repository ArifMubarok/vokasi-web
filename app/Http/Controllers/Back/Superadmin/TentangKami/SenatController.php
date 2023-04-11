<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\daftarSenat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;

class SenatController extends Controller
{
    public function index()
    {
        $senat = daftarSenat::where('badanSenat', 'senat')->get();
        $komisiA = daftarSenat::where('badanSenat', 'komisiA')->get();
        $komisiB = daftarSenat::where('badanSenat', 'komisiB')->get();
        $komisiC = daftarSenat::where('badanSenat', 'komisiC')->get();
        return view('back.pages.superadmin.tentangkami.senat.index',[
            'senat' => $senat,
            'komisiA' => $komisiA,
            'komisiB' => $komisiB,
            'komisiC' => $komisiC,
        ]);
    }

    public function editKetua($id)
    {
        $data = daftarSenat::where('id', $id)->firstOrFail();
        return view('back.pages.superadmin.tentangkami.senat.edit-ketua',[
            'data' => $data
        ]);
    }

    public function updateKetua(Request $request,$id)
    {
        $data = daftarSenat::where('id', $id)->firstOrFail();
        if ($request->foto != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\senat\\'.$data->foto))) {
                File::delete(public_path('storage\images\senat\\'.$data->foto));
            }
            $fileName=time().'.'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('images/senat/',$fileName,'public');
        }

        if ($request->foto == null) {
            $fileName = $data['foto'];
        }
        try {
            $data->update([
                'name' => $request->name,
                'foto' => $fileName
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.senat.index'))->with('success', 'Success saving data!');
    }
    public function editAnggota($id)
    {
        $data = daftarSenat::where('id', $id)->firstOrFail();
        return view('back.pages.superadmin.tentangkami.senat.edit-anggota',[
            'data' => $data
        ]);
    }

    public function updateAnggota(Request $request,$id)
    {
        $data = daftarSenat::where('id', $id)->firstOrFail();
        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div'];
        $request['name']=Purify::config($config)->clean($request->name);
        try {
            $data->update([
                'name' => $request->name,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.senat.index'))->with('success', 'Success saving data!');
    }
}
