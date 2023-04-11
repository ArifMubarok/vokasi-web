<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\BukuDanModul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = BukuDanModul::where('prodi_id', $this->prodiId())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.bukudanmodul.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . $row->link . '" class="btn btn-info buttons-edit" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('cover', function ($row) {
                    $url = asset('storage/images/bukudanmodul/' . $row->cover);
                    return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'cover', 'deskripsi'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.bukudanmodul.index');
    }

    public function create()
    {
        return view('back.pages.admin.bukudanmodul.create-edit');
    }

    public function store(Request $request)
    {
        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['deskripsi'] = Purify::config($config)->clean($request->deskripsi);

        // Saving Image
        $fileName = time() . '.' . $request->cover->getClientOriginalName();
        $request->cover->storeAs('images/bukudanmodul/', $fileName, 'public');
        $request->cover = $fileName;

        try {
            BukuDanModul::create([
                'prodi_id' => $this->prodiId(),
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
                'cover' => $request->cover,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.bukudanmodul.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = BukuDanModul::findOrFail($id);
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            return view('back.pages.admin.bukudanmodul.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = BukuDanModul::findOrFail($id);

            //check prodi
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }

            // Purify Unknown Script
            $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
            $request['deskripsi'] = Purify::config($config)->clean($request->deskripsi);

            if ($request->cover != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('storage\images\bukudanmodul\\' . $data->cover))) {
                    File::delete(public_path('storage\images\bukudanmodul\\' . $data->cover));
                }
                $fileName = time() . '.' . $request->cover->getClientOriginalName();
                $request->cover->storeAs('images/bukudanmodul', $fileName, 'public');
                $request->cover = $fileName;
            }

            if ($request->cover == null) {
                $request->cover = $data->cover;
            }

            try {
                $data->update([
                    'penulis' => $request->penulis,
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'link' => $request->link,
                    'cover' => $request->cover,
                ]);
            } catch (\Throwable$th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.bukudanmodul.index'))->with('success', 'Success saving data!');
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = BukuDanModul::findOrFail($request->id);

        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }

        // Delete old file and Saving Image
        if (file_exists(public_path('storage\images\bukudanmodul\\' . $data->cover))) {
            File::delete(public_path('storage\images\bukudanmodul\\' . $data->cover));
        }

        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
