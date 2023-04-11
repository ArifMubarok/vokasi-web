<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus;

use App\Http\Controllers\Controller;
use App\Models\fasilitasGedung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FasilitasGedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.superadmin.layanan.fasilitas-kampus.gedung.index');
    }

    public function getListGedung(Request $request)
    {
        if ($request->ajax()) {
            $data = fasilitasGedung::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.gedung.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('image', function ($row) {
                    $url = asset('storage/content/fasilitas/gedung/' . $row->image);
                    return '<img src="' . $url . '" border="0" width="90%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('back.pages.superadmin.layanan.fasilitas-kampus.gedung.create-edit');
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
            $request->image->storeAs('content/fasilitas/gedung/', $imageName, 'public');
            $request['image'] = $imageName;

            fasilitasGedung::create([
                'name' => $request->name,
                'image' => $imageName,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.gedung.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = fasilitasGedung::findOrFail($id);
        return view('back.pages.superadmin.layanan.fasilitas-kampus.gedung.create-edit', [
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
        $data = fasilitasGedung::where('id', $id)->firstOrFail();
        if ($request->image != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/fasilitas/gedung/' . $data->image))) {
                File::delete(public_path('storage/content/fasilitas/gedung/' . $data->image));
            }
            $imageName = time() . '.' . $request->file('image')->getClientOriginalName();
            $request->image->storeAs('content/fasilitas/gedung/', $imageName, 'public');
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
        return redirect(route('superadmin.layanan.fasilitas-kampus.gedung.index'))->with('success', 'Success saving data!');
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
        $data = fasilitasGedung::where('id', $id)->first();
        // Delete image
        if (file_exists(public_path('storage/content/fasilitas/gedung/' . $data->image))) {
            File::delete(public_path('storage/content/fasilitas/gedung/' . $data->image));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
