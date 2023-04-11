<?php

namespace App\Http\Controllers\Back\Humas\ManajemenBerita;

use App\Http\Controllers\Controller;
use App\Http\Requests\Humas\ManajemenBerita\KategoriForm;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        return view('back.pages.humas.manajemenberita.kategori.index');
    }
    
    public function getKategori (Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('humas.manajemen-berita.kategori.edit',$row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="'. $row->id .'" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('back.pages.humas.manajemenberita.kategori.create-edit');
    }

    public function store(KategoriForm $request)
    {
        try {
            Kategori::create($request->only([
                'name'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-berita.kategori.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('back.pages.humas.manajemenberita.kategori.create-edit',[
            'data' => $data
        ]);
    }

    public function update(KategoriForm $request, $id)
    {
        $data = Kategori::findOrFail($id);
        try {
            $data->update($request->only([
                'name'
            ]));
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-berita.kategori.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $prodi = Kategori::find($id);
        $prodi->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
