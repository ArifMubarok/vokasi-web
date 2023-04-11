<?php

namespace App\Http\Controllers\Back\Admin\SDM;

use App\Http\Controllers\Controller;
use App\Models\Sdm_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class SdmProdiController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = Sdm_prodi::where('prodi_id', $this->prodiId())->orderBy('posisi')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.sdm.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="window.confirm("Are you sure?");" ><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function ($row) {
                    $url = asset('storage/images/sdm_prodi/' . $row->foto);
                    return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->editColumn('link_iris', function ($row) {
                    $a = '<a href="' . $row->link_iris . '" target="_blank" rel="noopener noreferrer">' . $row->link_iris . '</a>';
                    return $a;
                })
            // ->editColumn('status', function ($row) {
            //     switch ($row->status) {
            //         case 0:
            //             return 'Not Published';
            //             break;

            //         default:
            //             return 'Published';
            //             break;
            //     }
            // })
                ->rawColumns(['action', 'link_iris', 'foto'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.sdm.index');
    }

    public function create()
    {
        return view('back.pages.admin.sdm.create-edit');
    }

    public function store(Request $request)
    {
        if ($request->foto) {
            $fileName = time() . '.' . $request->foto->getClientOriginalName();
            $request->foto->storeAs('images/sdm_prodi/', $fileName, 'public');
            $request->foto = $fileName;
        }

        try {
            Sdm_prodi::create([
                'prodi_id' => $this->prodiId(),
                'foto' => $request->foto,
                'name' => $request->name,
                'email' => $request->email,
                'link_iris' => $request->link_iris,
                'posisi' => $request->posisi,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.sdm.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = Sdm_prodi::findOrFail($id);
            return view('back.pages.admin.sdm.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Sdm_prodi::findOrFail($id);
            if ($request->foto != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('storage\images\sdm_prodi\\' . $data->foto))) {
                    File::delete(public_path('storage\images\sdm_prodi\\' . $data->foto));
                }
                $fileName = time() . '.' . $request->foto->getClientOriginalName();
                $request->foto->storeAs('images/sdm_prodi/', $fileName, 'public');
                $request->foto = $fileName;
            }

            if ($request->foto == null) {
                $request['foto'] = $data['foto'];
            }

            try {
                $data->update([
                    'prodi_id' => $this->prodiId(),
                    'foto' => $request->foto,
                    'name' => $request->name,
                    'email' => $request->email,
                    'link_iris' => $request->link_iris,
                    'posisi' => $request->posisi,
                ]);
            } catch (\Throwable$th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.sdm.index'))->with('success', 'Success saving data!');

        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }

    }

    public function hapus(Request $request)
    {
        $data = Sdm_prodi::findOrFail($request->id);
        // Delete Image
        if (file_exists(public_path('storage\images\sdm_prodi\\' . $data->foto))) {
            File::delete(public_path('storage\images\sdm_prodi\\' . $data->foto));
        }
        $data->delete();
        return redirect(route('admin.pages.sdm.index'))->with('delete', 'Success delete data!');
    }
}
