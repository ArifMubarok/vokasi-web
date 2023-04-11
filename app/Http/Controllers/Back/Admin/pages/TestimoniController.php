<?php

namespace App\Http\Controllers\Back\Admin\pages;

use App\Http\Controllers\Controller;
use App\Models\testimoni_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class TestimoniController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = testimoni_prodi::where('prodi_id', $this->prodiId())->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('admin.pages.testimoni.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="window.confirm("Are you sure?");" ><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function($row){
                    $url= asset('storage/images/testimoni/'.$row->foto);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                // ->editColumn('konten', function ($row) {
                //     $str = Str::limit($row->konten, 300);
                //     return $str;
                // })
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
                ->rawColumns(['action', 'testimoni', 'foto'])
                ->make(true);
        }
    }

    public function index()
    {
        return view('back.pages.admin.pages.testimoni.index');
    }

    public function create()
    {
        return view('back.pages.admin.pages.testimoni.create-edit');
    }

    public function store(Request $request)
    {
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request->testimoni = Purify::config($config)->clean($request->testimoni);

        $fileName=time().'.'.$request->foto->getClientOriginalName();
        $request->foto->storeAs('images/testimoni/',$fileName, 'public');
        $request->foto = $fileName;

        try {
            testimoni_prodi::create([
                'prodi_id' => $this->prodiId(),
                'foto' => $request->foto,
                'name' => $request->name,
                'keterangan' => $request->keterangan,
                'testimoni' => $request->testimoni
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.pages.testimoni.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = testimoni_prodi::findOrFail($id);
            return view('back.pages.admin.pages.testimoni.create-edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = testimoni_prodi::findOrFail($id);
            $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
            $request->testimoni = Purify::config($config)->clean($request->testimoni);
    
            if ($request->foto != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('storage\images\testimoni\\'.$data->foto))) {
                    File::delete(public_path('storage\images\testimoni\\'.$data->foto));
                }
                $fileName=time().'.'.$request->foto->getClientOriginalName();
                $request->foto->storeAs('images/testimoni/',$fileName,'public');
                $request->foto = $fileName;
            }
    
            if ($request->foto == null) {
                $request->foto = $data['foto'];
            }
    
            try {
                $data->update([
                    'prodi_id' => $this->prodiId(),
                    'foto' => $request->foto,
                    'name' => $request->name,
                    'keterangan' => $request->keterangan,
                    'testimoni' => $request->testimoni
                ]);
            } catch (\Throwable $th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.pages.testimoni.index'))->with('success', 'Success saving data!');

        } catch (\Throwable $th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = testimoni_prodi::findOrFail($request->id);
        // Delete Image
        if (file_exists(public_path('storage\images\testimoni\\'.$data->foto))) {
            File::delete(public_path('storage\images\testimoni\\'.$data->foto));
        }
        $data->delete();
        return redirect(route('admin.pages.sambutan.index'))->with('delete', 'Success delete data!');
    }
}
