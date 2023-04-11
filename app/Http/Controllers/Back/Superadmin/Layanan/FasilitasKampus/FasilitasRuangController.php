<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus;

use App\Http\Controllers\Controller;
use App\Models\fasilitasRuang;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FasilitasRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_ruang = Ruang::first();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.ruang.index', [
            'data_ruang' => $data_ruang,
        ]);
    }

    public function getListRuang(Request $request)
    {
        if ($request->ajax()) {
            $data = fasilitasRuang::latest()->with('ruang')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.ruang.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('gambar', function ($row) {
                    $url = asset('storage/content/fasilitas/ruang/' . $row->gambar);
                    return '<img src="' . $url . '" border="0" width="90%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'gambar'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang = Ruang::get();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.ruang.create-edit', [
            'ruang' => $ruang
        ]);
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
            $imageName = time() . '.' . $request->file('gambar')->getClientOriginalName();
            $request->gambar->storeAs('content/fasilitas/ruang/', $imageName, 'public');
            $request['gambar'] = $imageName;

            fasilitasRuang::create([
                'gambar' => $imageName,
                'ruang_id' => $request->ruang_id,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.ruang.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = fasilitasRuang::with('ruang')->findOrFail($id);
        $ruang = Ruang::get();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.ruang.create-edit', [
            'ruang' => $ruang,
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
        $data = fasilitasRuang::where('id', $id)->firstOrFail();
        if ($request->gambar != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/fasilitas/ruang/' . $data->gambar))) {
                File::delete(public_path('storage/content/fasilitas/ruang/' . $data->gambar));
            }
            $imageName = time() . '.' . $request->file('gambar')->getClientOriginalName();
            $request->gambar->storeAs('content/fasilitas/ruang/', $imageName, 'public');
            $request['gambar'] = $imageName;
        }

        if ($request->gambar == null) {
            $request['gambar'] = $data->gambar;
            $imageName = $request['gambar'];
        }

        try {
            $data->update([
                'gambar' => $imageName,
                'ruang_id' => $request->ruang_id
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.ruang.index'))->with('success', 'Success saving data!');
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
        $data = fasilitasRuang::where('id', $id)->first();
        // Delete image
        if (file_exists(public_path('storage/content/fasilitas/ruang/' . $data->gambar))) {
            File::delete(public_path('storage/content/fasilitas/ruang/' . $data->gambar));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }

    public function getRuang(Request $request)
    {
        if ($request->ajax()) {
            $data = Ruang::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.ruang.edits', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapuss btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function creates()
    {
        return view('back.pages.superadmin.layanan.fasilitas-kampus.ruang.creates-edits');
    }

    public function stores(Request $request)
    {
        try {
            Ruang::create([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.ruang.index'))->with('success', 'Success saving data!');
    }

    public function edits($id)
    {
        $data = Ruang::findOrFail($id);
        return view('back.pages.superadmin.layanan.fasilitas-kampus.ruang.creates-edits', [
            'data' => $data,
        ]);
    }

    public function updates(Request $request, $id)
    {
        $data = Ruang::where('id', $id)->firstOrFail();
        try {
            $data->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.ruang.index'))->with('success', 'Success saving data!');
    }

    public function hapuss(Request $request)
    {
        $id = $request->id;
        $data = Ruang::where('id', $id)->first();

        $data_foto_ruang = fasilitasRuang::where('ruang_id', $id)->get();
        // Delete image
        foreach ($data_foto_ruang as $item) {
            if (file_exists(public_path('storage/content/fasilitas/ruang/' . $item->gambar))) {
                File::delete(public_path('storage/content/fasilitas/ruang/' . $item->gambar));
            }
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}