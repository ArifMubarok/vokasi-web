<?php

namespace App\Http\Controllers\Back\Superadmin\Produk;

use App\Http\Controllers\Controller;
use App\Models\JurnalModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JurnalController extends Controller
{

    public function index()
    {
        return view('back.pages.superadmin.produk.jurnal.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = JurnalModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.produk.jurnal.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
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
        return view('back.pages.superadmin.produk.jurnal.create-edit');
    }

    public function store(Request $request)
    {
        JurnalModel::create([
            'nama' => $request->nama,
            'terakreditasi' => $request->terakreditasi,
        ]);

        try {
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.produk.jurnal.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = JurnalModel::findOrFail($id);
        return view('back.pages.superadmin.produk.jurnal.create-edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {

        $data = JurnalModel::findOrFail($id);
        try {
            $data->update([
                'nama' => $request->nama,
                'terakreditasi' => $request->terakreditasi,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.produk.jurnal.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $berita = JurnalModel::find($id);
        $berita->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
