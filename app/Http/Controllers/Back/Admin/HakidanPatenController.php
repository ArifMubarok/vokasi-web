<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrupRisetModel;
use App\Models\hakiProdiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HakidanPatenController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = hakiProdiModel::where('prodi_id', $this->prodiId())->with(['prodi', 'grup'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.hakidanpaten.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a id="' . $row->id . '" class="hapus btn btn-danger " onclick="window.confirm("Are you sure?");" ><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.hakidanpaten.index');
    }

    public function create()
    {
        $grup = GrupRisetModel::get();
        return view('back.pages.admin.hakidanpaten.create-edit', [
            'grup' => $grup
        ]);
    }

    public function store(Request $request)
    {
        try {
            hakiProdiModel::create([
                'prodi_id' => $this->prodiId(),
                'grup_id' => $request->grup_id,
                'haki' => $request->haki,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.hakidanpaten.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = hakiProdiModel::findOrFail($id);
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            return view('back.pages.admin.hakidanpaten.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = hakiProdiModel::findOrFail($id);

            //check prodi
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }

            try {
                $data->update([
                    'grup_id' => $request->grup_id,
                    'haki' => $request->haki,
                ]);
            } catch (\Throwable$th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.hakidanpaten.index'))->with('success', 'Success saving data!');
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = hakiProdiModel::findOrFail($request->id);

        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }

        $data->delete();
        return redirect(route('admin.hakidanpaten.index'))->with('delete', 'Success delete data!');
    }
}
