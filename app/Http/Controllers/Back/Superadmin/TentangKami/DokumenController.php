<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Http\Controllers\Controller;
// use App\Models\konten;
// use App\Models\pages;
// use App\Models\page_konten;
use App\Models\DokumensvModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.superadmin.tentangkami.dokumen.index');
    }

    public function getDokumen(Request $request)
    {
        if ($request->ajax()) {
            $data = DokumensvModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.dokumen.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.dokumen.show', $row->name) . '" class="btn btn-info buttons-edit" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('cover',function($row){
                    $url = asset('storage/content/dokumen/cover/'.$row->cover);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                    
                })
                ->rawColumns(['action', 'cover'])
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
        return view('back.pages.superadmin.tentangkami.dokumen.create-edit');
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
            $coverName = $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('content/dokumen/cover/', $coverName, 'public');
            $request->cover = $coverName;

            $fileName = $request->file('file')->getClientOriginalName();
            $request->file->storeAs('content/dokumen/file/', $fileName, 'public');
            $request->file = $fileName;

            DokumensvModel::create([
                'name' => $request->name,
                'cover' => $request->cover,
                'deskripsi' => $request->deskripsi,
                'file' => $request->file,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.dokumen.index'))->with('success', 'Success saving data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = DokumensvModel::where('name', $name)->first();
        // file path
        // $path = asset('storage/content/dokumen/file/'.$data->file);
        $path = public_path('storage/content/dokumen/file/' . $data->file);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->name . '"',
        ];
        return response()->file($path, $header);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DokumensvModel::findOrFail($id);
        return view('back.pages.superadmin.tentangkami.dokumen.create-edit', [
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
        $data = DokumensvModel::where('id', $id)->firstOrFail();
        if ($request->file != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/dokumen/file/' . $data->file))) {
                File::delete(public_path('storage/content/dokumen/file/' . $data->file));
            }
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file->storeAs('content/dokumen/file/', $fileName, 'public');
            $request->file = $fileName;
        }
        if ($request->cover != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/dokumen/cover/' . $data->cover))) {
                File::delete(public_path('storage/content/dokumen/cover/' . $data->cover));
            }
            $coverName = $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('content/dokumen/cover/', $coverName, 'public');
            $request->cover = $coverName;
        }
        

        if ($request->file == null) {
            $request->file = $data->file;
        }

        if ($request->cover == null) {
            $request->cover = $data->cover;
        }
        try {
            $data->update([
                'name' => $request->name,
                'cover' => $request->cover,
                'deskripsi' => $request->deskripsi,
                'file' => $request->file,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.dokumen.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = DokumensvModel::where('id', $id)->first();
        // Delete File
        if (file_exists(public_path('storage/content/dokumen/file/' . $data->file))) {
            File::delete(public_path('storage/content/dokumen/file/' . $data->file));
        }
        // Delete Cover
        if (file_exists(public_path('storage/content/dokumen/cover/' . $data->cover))) {
            File::delete(public_path('storage/content/dokumen/cover/' . $data->cover));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
