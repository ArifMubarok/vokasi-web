<?php

namespace App\Http\Controllers\Back\Superadmin\Produk;

use App\Http\Controllers\Controller;
use App\Models\GrupRisetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class GrupRisetController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function index()
    {
        // dd(GrupRisetModel::with('berita_kategori.kategori:id,name')->latest()->first()->berita_kategori->pluck('kategori.name')->toArray());
        return view('back.pages.admin.grup-riset.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = GrupRisetModel::where('prodi_id', $this->prodiId())->with('prodi')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.grup-riset.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'anggota'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('back.pages.admin.grup-riset.create-edit');
    }

    public function store(Request $request)
    {
        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['anggota'] = Purify::config($config)->clean($request->anggota);

        try {
            GrupRisetModel::create([
                'prodi_id' => $this->prodiId(),
                'nama' => $request->nama,
                'anggota' => $request->anggota,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.grup-riset.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = GrupRisetModel::findOrFail($id);
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }
        return view('back.pages.admin.grup-riset.create-edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {

        
        $data = GrupRisetModel::findOrFail($id);
        
        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }
        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['anggota'] = Purify::config($config)->clean($request->anggota);
        try {
            $data->update([
                'nama' => $request->nama,
                'anggota' => $request->anggota,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.grup-riset.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $berita = GrupRisetModel::find($id);
        $berita->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
