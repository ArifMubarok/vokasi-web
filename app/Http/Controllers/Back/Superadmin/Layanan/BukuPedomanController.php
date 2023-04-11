<?php

namespace App\Http\Controllers\Back\Superadmin\Layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuPedoman;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class BukuPedomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.superadmin.layanan.akademik.buku-pedoman.index');
    }

    public function getBukuPedoman(Request $request)
    {
        if ($request->ajax()) {
            $data = BukuPedoman::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.akademik.buku-pedoman.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('superadmin.layanan.akademik.buku-pedoman.show', $row->name) . '" class="btn btn-info buttons-edit" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('cover', function ($row) {
                    $url = asset('storage/content/buku-pedoman/cover/' . $row->cover);
                    return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
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
        return view('back.pages.superadmin.layanan.akademik.buku-pedoman.create-edit');
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
            $coverName = time() . '.' . $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('content/buku-pedoman/cover/', $coverName, 'public');
            $request['cover'] = $coverName;

            $fileName = time() . '.' . $request->file('file')->getClientOriginalName();
            $request->file->storeAs('content/buku-pedoman/file/', $fileName, 'public');
            $request['file'] = $fileName;

            BukuPedoman::create([
                'name' => $request->name,
                'cover' => $coverName,
                'deskripsi' => $request->deskripsi,
                'file' => $fileName,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.akademik.buku-pedoman.index'))->with('success', 'Success saving data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = BukuPedoman::where('name', $name)->first();
        // file path
        // $path = asset('storage/content/renstra/file/'.$data->file);
        $path = public_path('storage/content/buku-pedoman/file/' . $data->file);
        // dd($path);
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
        $data = BukuPedoman::findOrFail($id);
        return view('back.pages.superadmin.layanan.akademik.buku-pedoman.create-edit', [
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
        $data = BukuPedoman::where('id', $id)->firstOrFail();
        if ($request->file != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/buku-pedoman/file/' . $data->file))) {
                File::delete(public_path('storage/content/buku-pedoman/file/' . $data->file));
            }
            $fileName = time() . '.' . $request->file('file')->getClientOriginalName();
            $request->file->storeAs('content/buku-pedoman/file/', $fileName, 'public');
            $request['file'] = $fileName;
        }
        if ($request->cover != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage/content/buku-pedoman/cover/' . $data->cover))) {
                File::delete(public_path('storage/content/buku-pedoman/cover/' . $data->cover));
            }
            $coverName = time() . '.' . $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('content/buku-pedoman/cover/', $coverName, 'public');
            $request['cover'] = $coverName;
        }


        if ($request->file == null) {
            $request['file'] = $data->file;
            $fileName = $request['file'];
        }

        if ($request->cover == null) {
            $request['cover'] = $data->cover;
            $coverName = $request['cover'];
        }
        try {
            $data->update([
                'name' => $request->name,
                'cover' => $coverName,
                'deskripsi' => $request->deskripsi,
                'file' => $fileName,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.layanan.akademik.buku-pedoman.index'))->with('success', 'Success saving data!');
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
        $data = BukuPedoman::where('id', $id)->first();
        // Delete File
        if (file_exists(public_path('storage/content/buku-pedoman/file/' . $data->file))) {
            File::delete(public_path('storage/content/buku-pedoman/file/' . $data->file));
        }
        // Delete Cover
        if (file_exists(public_path('storage/content/buku-pedoman/cover/' . $data->cover))) {
            File::delete(public_path('storage/content/buku-pedoman/cover/' . $data->cover));
        }
        // DATABASE DELETE
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}