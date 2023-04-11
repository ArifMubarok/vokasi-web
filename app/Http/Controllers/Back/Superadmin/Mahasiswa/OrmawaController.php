<?php

namespace App\Http\Controllers\Back\Superadmin\Mahasiswa;

use App\Http\Controllers\Controller;
// use App\Models\page_konten;
use App\Models\OrmawaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class OrmawaController extends Controller
{
    public function index()
    {
        return view('back.pages.superadmin.mahasiswa.ormawa.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = OrmawaModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.mahasiswa.ormawa.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('logo',function($row){
                    $url = asset('storage/mahasiswa/ormawa/logo/'.$row->logo);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'logo'])
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
        return view('back.pages.superadmin.mahasiswa.ormawa.create-edit');
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
            $fileName = time().'.'.$request->file('logo')->getClientOriginalName();
            $request->logo->storeAs('mahasiswa/ormawa/logo/', $fileName, 'public');
            $request->logo = $fileName;

            OrmawaModel::create([
                'name' => $request->name,
                'logo' => $request->logo,
                'deskripsi' => $request->deskripsi,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.mahasiswa.ormawa.index'))->with('success', 'Success saving data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrmawaModel::findOrFail($id);
        return view('back.pages.superadmin.mahasiswa.ormawa.create-edit', [
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
        $data = OrmawaModel::where('id', $id)->firstOrFail();
        if ($request->file != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/mahasiswa/ormawa/logo/' . $data->file))) {
                File::delete(public_path('storage/mahasiswa/ormawa/logo/' . $data->file));
            }
            $fileName = time().'.'.$request->file('logo')->getClientOriginalName();
            $request->logo->storeAs('mahasiswa/ormawa/logo/', $fileName, 'public');
            $request->logo = $fileName;
        }

        if ($request->logo == null) {
            $request->logo = $data->logo;
        }

        try {
            $data->update([
                'name' => $request->name,
                'logo' => $request->logo,
                'deskripsi' => $request->deskripsi,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.mahasiswa.ormawa.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = OrmawaModel::where('id', $id)->first();
        // Delete File
        if (file_exists(public_path('storage/mahasiswa/ormawa/logo/' . $data->file))) {
            File::delete(public_path('storage/mahasiswa/ormawa/logo/' . $data->file));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
