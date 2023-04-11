<?php

namespace App\Http\Controllers\Back\Humas;

use App\Http\Controllers\Controller;
use App\Models\mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ManajemenMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.humas.manajemenkerjasama.index');
    }

    public function getKerjasama(Request $request)
    {
        if ($request->ajax()) {
            $data = mitra::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('humas.manajemen-kerjasama.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function ($row) {
                    $url = asset('storage/images/kerjasama/' . $row->foto);
                    return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->editColumn('link', function ($row) {
                    $link = '<a href="' . $row->link . '" target="_blank" rel="noopener noreferrer">' . $row->link . '</a>';
                    return $link;
                })
                ->rawColumns(['action', 'foto', 'link'])
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
        return view('back.pages.humas.manajemenkerjasama.create-edit');
    }

    public function store(Request $request)
    {
        // Saving Image
        $fileName = time() . '.' . $request->foto->getClientOriginalName();
        $request->foto->storeAs('images/kerjasama', $fileName, 'public');

        try {
            mitra::create([
                'name' => $request->name,
                'foto' => $fileName,
                'link' => $request->link,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-kerjasama.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = mitra::findOrFail($id);
        return view('back.pages.humas.manajemenkerjasama.create-edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = mitra::findOrFail($id);

        // Delete old file and Saving Image
        if ($request->foto != null) {
            if (file_exists(public_path('storage\images\kerjasama\\' . $data->foto))) {
                File::delete(public_path('storage\images\kerjasama\\' . $data->foto));
            }
            $fileName = time() . '.' . $request->foto->getClientOriginalName();
            $request->foto->storeAs('images/kerjasama', $fileName, 'public');
        }
        if ($request->foto == null) {
            $request['foto'] = $data['foto'];
        }

        try {
            $data->update([
                'name' => $request->name,
                'foto' => $fileName,
                'link' => $request->link,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-kerjasama.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $berita = mitra::find($id);
        $berita->delete();
        // Delete Image
        if (file_exists(public_path('storage\images\\' . $berita->foto_header))) {
            File::delete(public_path('storage\images\\' . $berita->foto_header));
        }
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
