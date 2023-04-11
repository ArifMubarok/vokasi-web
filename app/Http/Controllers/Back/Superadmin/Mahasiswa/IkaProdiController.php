<?php

namespace App\Http\Controllers\Back\Superadmin\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\IkaprodiModel;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class IkaProdiController extends Controller
{
    public function index()
    {
        return view('back.pages.superadmin.mahasiswa.ikaprodi.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = IkaprodiModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.mahasiswa.ikaprodi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('prodi',function($row){
                    $data = $row->prodi->name ;
                    return $data;
                })
                ->editColumn('informasi',function($row){
                    $data = '<a href="'.$row->informasi.'" target="_blank" rel="noopener noreferrer">'.$row->informasi.'</a>' ;
                    return $data;
                })
                ->rawColumns(['action', 'prodi', 'informasi'])
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
        return view('back.pages.superadmin.mahasiswa.ikaprodi.create-edit', [
            'prodis' => Prodi::all(),
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
            IkaprodiModel::create([
                'nama' => $request->nama,
                'informasi' => $request->informasi,
                'prodi_id' => $request->prodi_id,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.mahasiswa.ikaprodi.index'))->with('success', 'Success saving data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = IkaprodiModel::findOrFail($id);
        return view('back.pages.superadmin.mahasiswa.ikaprodi.create-edit', [
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
        $data = IkaprodiModel::where('id', $id)->firstOrFail();

        try {
            $data->update([
                'nama' => $request->nama,
                'informasi' => $request->informasi,
                'prodi_id' => $request->prodi_id,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.mahasiswa.ikaprodi.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = IkaprodiModel::where('id', $id)->first();
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
