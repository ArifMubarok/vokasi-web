<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\produkUnggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ProdukUnggulanController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = produkUnggulan::where('prodi_id', $this->prodiId())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.produk-unggulan.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . $row->leaflet . '" class="btn btn-info buttons-edit" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                // ->editColumn('leaflet', function ($row) {
                //     $url = asset('storage/images/produk-unggulan/' . $row->leaflet);
                //     return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
                // })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.produk-unggulan.index');
    }

    public function create()
    {
        return view('back.pages.admin.produk-unggulan.create-edit');
    }

    public function store(Request $request)
    {
        if ($request->leaflet) {
            // Saving Image
            $fileName = time() . '.' . $request->leaflet->getClientOriginalName();
            $request->leaflet->storeAs('images/produk-unggulan/', $fileName, 'public');
            $request->leaflet = $fileName;
        }

        try {
            produkUnggulan::create([
                'prodi_id' => $this->prodiId(),
                'produk' => $request->produk,
                'leaflet' => $request->leaflet,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.produk-unggulan.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = produkUnggulan::findOrFail($id);
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            return view('back.pages.admin.produk-unggulan.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = produkUnggulan::findOrFail($id);

            //check prodi
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }

            if ($request->leaflet != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('storage\images\produk-unggulan\\' . $data->leaflet))) {
                    File::delete(public_path('storage\images\produk-unggulan\\' . $data->leaflet));
                }
                $fileName = time() . '.' . $request->leaflet->getClientOriginalName();
                $request->leaflet->storeAs('images/produk-unggulan/', $fileName, 'public');
                $request->leaflet = $fileName;
            }

            if ($request->leaflet == null) {
                $request->leaflet = $data->leaflet;
            }

            try {
                $data->update([
                    'produk' => $request->produk,
                    'leaflet' => $request->leaflet,
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.produk-unggulan.index'))->with('success', 'Success saving data!');
        } catch (\Throwable $th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = produkUnggulan::findOrFail($request->id);

        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }

        // Delete old file and Saving Image
        if (file_exists(public_path('storage\images\produk-unggulan\\' . $data->leaflet))) {
            File::delete(public_path('storage\images\produk-unggulan\\' . $data->leaflet));
        }

        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
