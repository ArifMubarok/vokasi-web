<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kalender = page_konten::where('pages_name', 'akademik')->with('konten')->get();
        return view('back.pages.superadmin.layanan.akademik.kalender-akademik.index', [
            'kalender' => $kalender,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editKalender($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.layanan.akademik.kalender-akademik.editKalender', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        // Saving Image and deleting old image
        if (file_exists(public_path('storage/images/kalender-akademik/' . $data->value))) {
            File::delete(public_path('storage/images/kalender-akademik/' . $data->value));
        }
        $fileName = time() . '.' . $request->value->getClientOriginalName();
        $request->value->storeAs('images/kalender-akademik/', $fileName, 'public');
        $request['value'] = $fileName;


        try {
            $data->update([
                'value' => $fileName
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.akademik.kalender-akademik.index'))->with('success', 'Success saving data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}