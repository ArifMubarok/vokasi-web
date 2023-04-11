<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\pages;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use App\Models\profilsambutan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = page_konten::where('pages_name', 'profil')->orderBy('konten_id', 'desc')->with('konten')->get();
        $sambutan = profilsambutan::first();
        return view('back.pages.superadmin.tentangkami.profil.index', [
            'profil' => $profil,
            'sambutan' => $sambutan
        ]);
    }

    public function editProfil($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.profil.editprofil', [
            'data' => $data,
        ]);
    }

    public function editPicture($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.profil.editpicture', [
            'data' => $data,
        ]);
    }
    
    public function editSambutan($id)
    {
        $data = profilsambutan::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.profil.editsambutan', [
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
                return redirect(route('superadmin.tentangkami.profil.index'))->with('success', 'Success saving data!');
                break;
            case 'Update Picture':
                $data = konten::findOrFail($id);
                // Saving Image
                $fileName = time() . '.' . $request->value->getClientOriginalName();
                $request->value->storeAs('images/profilsv/', $fileName, 'public');
                $request['value'] = $fileName;
                try {
                    $data->update([
                        'value' => $fileName
                    ]);
                } catch (\Throwable$th) {
                    return back()->with('error', 'Error when submit to system');
                }
                return redirect(route('superadmin.tentangkami.profil.index'))->with('success', 'Success saving data!');
                break;
            
            case 'Update Sambutan':
                $data = profilsambutan::findOrFail($id);
                //purify script
                $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,img[width|height|alt|src],img[style],img[data-filename],img[class],span[style],div[style]'];
                $request['sambutan'] = Purify::config($config)->clean($request->sambutan);
                if ($request->picture != null) {
                    // Delete old file and Saving Image
                    if (file_exists(public_path('storage\images\profilsv\\'.$data->picture))) {
                        File::delete(public_path('storage\images\profilsv\\'.$data->picture));
                    }
                    $fileName=time().'.'.$request->picture->getClientOriginalName();
                    $request->picture->storeAs('images/profilsv',$fileName,'public');
                    $request->picture = $fileName;
                }
        
                if ($request->picture == null) {
                    $request->picture = $data['picture'];
                }
                $data->update([
                    'picture' => $request->picture,
                    'name' => $request->name,
                    'sambutan' =>$request->sambutan
                ]);
                try {
                } catch (\Throwable$th) {
                    return back()->with('error', 'Error when submit to system');
                }
                return redirect(route('superadmin.tentangkami.profil.index'))->with('success', 'Success saving data!');
                break;
            default:
                return back()->with('error', 'Error when submit to system');
                break;
        }
    }
}
