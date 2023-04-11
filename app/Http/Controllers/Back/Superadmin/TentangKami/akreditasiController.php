<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Http\Controllers\Controller;
use App\Models\akreditasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class akreditasiController extends Controller
{
    public function index()
    {
        return view('back.pages.superadmin.tentangkami.akreditasi.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = akreditasi::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.akreditasi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('back.pages.superadmin.tentangkami.akreditasi.create-edit');
    }

    public function store(Request $request)
    {
        try {
            akreditasi::create([
                'prodi' => $request->prodi,
                'akreditasi' => $request->akreditasi,
                'nomorAkreditas' => $request->nomorAkreditas,
                'masa' => $request->masa
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.akreditasi.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = akreditasi::findOrFail($id);
        return view('back.pages.superadmin.tentangkami.akreditasi.create-edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = akreditasi::findOrFail($id);
        try {
            $data->update([
                'prodi' => $request->prodi,
                'akreditasi' => $request->akreditasi,
                'nomorAkreditas' => $request->nomorAkreditas,
                'masa' => $request->masa
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.akreditasi.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = akreditasi::findOrFail($id);
        $data->delete();

        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
