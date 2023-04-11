<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan\FasilitasKampus;

use App\Http\Controllers\Controller;
use App\Models\fasilitasLab_Lapangan;
use App\Models\Lab_lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FasilitasLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_lap = Lab_lapangan::first();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.laboratorium-lapangan.index', [
            'data_lap' => $data_lap,
        ]);
    }

    public function getListLap(Request $request)
    {
        if ($request->ajax()) {
            $data = fasilitasLab_Lapangan::latest()->with('lap')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.lab-lapangan.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('gambar', function ($row) {
                    $url = asset('storage/content/fasilitas/laboratorium-lapangan/' . $row->gambar);
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
        $lap = Lab_lapangan::get();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.laboratorium-lapangan.create-edit', [
            'lap' => $lap
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
            $request->gambar->storeAs('content/fasilitas/laboratorium-lapangan/', $imageName, 'public');
            $request['gambar'] = $imageName;

            fasilitasLab_Lapangan::create([
                'gambar' => $imageName,
                'lap_id' => $request->lap_id,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.lab-lapangan.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = fasilitasLab_Lapangan::with('lap')->findOrFail($id);
        $lap = Lab_lapangan::get();
        return view('back.pages.superadmin.layanan.fasilitas-kampus.laboratorium-lapangan.create-edit', [
            'lap' => $lap,
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
        $data = fasilitasLab_Lapangan::where('id', $id)->firstOrFail();
        if ($request->gambar != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $data->gambar))) {
                File::delete(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $data->gambar));
            }
            $imageName = time() . '.' . $request->file('gambar')->getClientOriginalName();
            $request->gambar->storeAs('content/fasilitas/laboratorium-lapangan/', $imageName, 'public');
            $request['gambar'] = $imageName;
        }

        if ($request->gambar == null) {
            $request['gambar'] = $data->gambar;
            $imageName = $request['gambar'];
        }

        try {
            $data->update([
                'gambar' => $imageName,
                'lap_id' => $request->lap_id
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.lab-lapangan.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = fasilitasLab_Lapangan::where('id', $id)->first();
        // Delete image
        if (file_exists(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $data->gambar))) {
            File::delete(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $data->gambar));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }

    public function getLap(Request $request)
    {
        if ($request->ajax()) {
            $data = Lab_lapangan::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.fasilitas-kampus.lab-lapangan.edits', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
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
        return view('back.pages.superadmin.layanan.fasilitas-kampus.laboratorium-lapangan.creates-edits');
    }

    public function stores(Request $request)
    {
        try {
            Lab_lapangan::create([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.lab-lapangan.index'))->with('success', 'Success saving data!');
    }

    public function edits($id)
    {
        $data = Lab_lapangan::findOrFail($id);
        return view('back.pages.superadmin.layanan.fasilitas-kampus.laboratorium-lapangan.creates-edits', [
            'data' => $data,
        ]);
    }

    public function updates(Request $request, $id)
    {
        $data = Lab_lapangan::where('id', $id)->firstOrFail();
        try {
            $data->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.fasilitas-kampus.lab-lapangan.index'))->with('success', 'Success saving data!');
    }

    public function hapuss(Request $request)
    {
        $id = $request->id;
        $data = Lab_lapangan::where('id', $id)->first();

        $data_foto_lap = fasilitasLab_Lapangan::where('lap_id', $id)->get();
        // Delete image
        foreach ($data_foto_lap as $item) {
            if (file_exists(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $item->gambar))) {
                File::delete(public_path('storage/content/fasilitas/laboratorium-lapangan/' . $item->gambar));
            }
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}