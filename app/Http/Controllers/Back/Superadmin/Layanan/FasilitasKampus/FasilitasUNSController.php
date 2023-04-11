<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus;

use App\Http\Controllers\Controller;
use App\Models\fasilitasUNS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FasilitasUNSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.superadmin.layanan.fasilitas-kampus.uns.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getListUNS(Request $request)
    {
        if ($request->ajax()) {
            $data = fasilitasUNS::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.uns.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('image', function ($row) {
                    $url = asset('storage/content/fasilitas/uns/' . $row->image);
                    return '<img src="' . $url . '" border="0" width="90%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }
    public function create()
    {
        return view('back.pages.superadmin.layanan.fasilitas-kampus.uns.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalName();
            $request->image->storeAs('content/fasilitas/uns/', $imageName, 'public');
            $request['image'] = $imageName;

            fasilitasUNS::create([
                'name' => $request->name,
                'image' => $imageName,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.uns.index'))->with('success', 'Success saving data!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = fasilitasUNS::findOrFail($id);
        return view('back.pages.superadmin.layanan.fasilitas-kampus.uns.create-edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = fasilitasUNS::where('id', $id)->firstOrFail();
        if ($request->image != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/fasilitas/uns/' . $data->image))) {
                File::delete(public_path('storage/content/fasilitas/uns/' . $data->image));
            }
            $imageName = time() . '.' . $request->file('image')->getClientOriginalName();
            $request->image->storeAs('content/fasilitas/uns/', $imageName, 'public');
            $request['image'] = $imageName;
        }

        if ($request->image == null) {
            $request['image'] = $data->image;
            $imageName = $request['image'];
        }

        try {
            $data->update([
                'name' => $request->name,
                'image' => $imageName,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.uns.index'))->with('success', 'Success saving data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = fasilitasUNS::where('id', $id)->first();
        // Delete image
        if (file_exists(public_path('storage/content/fasilitas/uns/' . $data->image))) {
            File::delete(public_path('storage/content/fasilitas/uns/' . $data->image));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}