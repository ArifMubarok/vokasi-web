<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\sdm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class sdmController extends Controller
{
    public function index()
    {
        return view('back.pages.superadmin.tentangkami.sdm.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = sdm::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.sdm.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function($row){
                    $url= asset('storage/images/sdm/'.$row->foto);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('back.pages.superadmin.tentangkami.sdm.create-edit');
    }

    public function store(Request $request)
    {
        // Save Image
        $fileName = time() . '.' . $request->foto->getClientOriginalName();
        $request->foto->storeAs('images/sdm/', $fileName, 'public');
        $request->foto = $fileName;
        
        try {
            sdm::create([
                'name' => $request->name,
                'unit' => $request->unit,
                'jabatan' => $request->jabatan,
                'foto' => $request->foto,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.sdm.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = sdm::findOrFail($id);
        return view('back.pages.superadmin.tentangkami.sdm.create-edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = sdm::findOrFail($id);
        
        if ($request->foto != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\sdm\\'.$data->foto))) {
                File::delete(public_path('storage\images\sdm\\'.$data->foto));
            }
            $fileName=time().'.'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('images/sdm/',$fileName,'public');
            $request->foto = $fileName;
        }

        if ($request->foto == null) {
            $request->foto = $data['foto'];
        }
        try {
            $data->update([
                'name' => $request->name,
                'unit' => $request->unit,
                'jabatan'=> $request->jabatan,
                'foto' => $request->foto,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.sdm.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = sdm::where('id', $id)->first();
        // Delete File
        if (file_exists(public_path('storage\images\sdm\\'.$data->foto))) {
            File::delete(public_path('storage\images\sdm\\'.$data->foto));
        }
        // DATABASE DELETE
        $data->delete();

        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
