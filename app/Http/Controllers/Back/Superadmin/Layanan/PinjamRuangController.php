<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PinjamRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam_ruang = page_konten::where('pages_name', 'pinjam-ruang')->with('konten')->get();
        return view('back.pages.superadmin.layanan.non-akademik.pinjam-ruang.index', [
            'pinjam_ruang' => $pinjam_ruang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editPinjamRuang($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.layanan.non-akademik.pinjam-ruang.editPinjamRuang', [
            'data' => $data,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        // Saving Image and Deleting old image
        if (file_exists(public_path('storage/images/pinjam-ruang/' . $data->value))) {
            File::delete(public_path('storage/images/pinjam-ruang/' . $data->value));
        }
        $fileName = time() . '.' . $request->value->getClientOriginalName();
        $request->value->storeAs('images/pinjam-ruang/', $fileName, 'public');
        $request['value'] = $fileName;
        try {
            $data->update([
                'value' => $fileName
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.non-akademik.pinjam-ruang.index'))->with('success', 'Success saving data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}