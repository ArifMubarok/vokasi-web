<?php

namespace App\Http\Controllers\Back\Admin\pages;

use App\Http\Controllers\Controller;
use App\Models\Detail_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

class LaboratoriumController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    private function getDataObject(){
        return Detail_prodi::where('prodi_id', $this->prodiId())->where('name', 'laboratorium')->first();
    }

    public function index()
    {
        return view('back.pages.admin.pages.laboratorium.index', [
            'data' => $this->getDataObject()
        ]);
    }

    public function create()
    {
        return view('back.pages.admin.pages.laboratorium.create-edit');
    }

    public function store(Request $request)
    {
        $prodi_id = $this->prodiId();

        if (!(Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'laboratorium')->first())) {
            Detail_prodi::create([
                'prodi_id' => $prodi_id,
                'name' => 'laboratorium',
                'value' => ''
            ]);
        }

        $data = Detail_prodi::where('prodi_id', $prodi_id)->where('name', 'laboratorium')->first();
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request->value = Purify::config($config)->clean($request->value);

        try {
            $data->update([
                'value' => $request->value
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.pages.laboratorium.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = Detail_prodi::findOrFail($id);
        return view('back.pages.admin.pages.laboratorium.create-edit',[
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Detail_prodi::findOrFail($id);
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request->value = Purify::config($config)->clean($request->value);

        try {
            $data->update([
                'value' => $request->value
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.pages.laboratorium.index'))->with('success', 'Success saving data!');

    }

    public function destroy($id)
    {
        
        $data = Detail_prodi::findOrFail($id);
        $data->delete();
        return redirect(route('admin.pages.laboratorium.index'))->with('delete', 'Success delete data!');
    }
}
