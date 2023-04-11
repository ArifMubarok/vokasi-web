<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokumenAkreditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DokumenAkreditasiController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = dokumenAkreditasi::where('prodi_id', $this->prodiId())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.akreditasi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . $row->link . '" class="btn btn-info buttons-edit" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.akreditasi.index');
    }

    public function create()
    {
        return view('back.pages.admin.akreditasi.create-edit');
    }

    public function store(Request $request)
    {
        try {
            dokumenAkreditasi::create([
                'prodi_id' => $this->prodiId(),
                'name' => $request->name,
                'link' => $request->link,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.akreditasi.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = dokumenAkreditasi::findOrFail($id);
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            return view('back.pages.admin.akreditasi.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = dokumenAkreditasi::findOrFail($id);

            //check prodi
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            try {
                $data->update([
                    'name' => $request->name,
                    'link' => $request->link,
                ]);
            } catch (\Throwable$th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.akreditasi.index'))->with('success', 'Success saving data!');
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = dokumenAkreditasi::findOrFail($request->id);

        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }

        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
