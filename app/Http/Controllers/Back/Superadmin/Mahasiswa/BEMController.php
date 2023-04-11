<?php

namespace App\Http\Controllers\Back\Superadmin\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class BEMController extends Controller
{
    public function index()
    {
        $data = page_konten::where('pages_name', 'mahasiswa')->orderBy('konten_id', 'asc')->with('konten')->get();
        // dd($data);
        return view('back.pages.superadmin.mahasiswa.bem.index', [
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.mahasiswa.bem.edit', [
            'data' => $data,
        ]);
    }

    public function editPicture($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.mahasiswa.bem.editpicture', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        switch ($request->submitbutton) {
            case 'Update Profile':
                $data = konten::findOrFail($id);
                //purify script
                $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,img[width|height|alt|src],img[style],img[data-filename],img[class],span[style],div[style]'];
                $request['value'] = Purify::config($config)->clean($request->value);
                try {
                    $data->update([
                        'value' => $request->value
                    ]);
                } catch (\Throwable$th) {
                    return back()->with('error', 'Error when submit to system');
                }
                return redirect(route('superadmin.mahasiswa.bem.index'))->with('success', 'Success saving data!');
                break;
            case 'Update Picture':
                $data = konten::findOrFail($id);
                // Saving Image
                $fileName = time() . '.' . $request->value->getClientOriginalName();
                $request->value->storeAs('images/mahasiswa/bem/', $fileName, 'public');
                $request['value'] = $fileName;
                try {
                    $data->update([
                        'value' => $fileName
                    ]);
                } catch (\Throwable$th) {
                    return back()->with('error', 'Error when submit to system');
                }
                return redirect(route('superadmin.mahasiswa.bem.index'))->with('success', 'Success saving data!');
                break;
            default:
                return back()->with('error', 'Error when submit to system');
                break;
        }
    }
}
