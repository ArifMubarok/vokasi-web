<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use Illuminate\Http\Request;
use App\Models\profilPimpinan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class ProfilPimpinanController extends Controller
{
    private function getData($request, $data)
    {
        if ($request->ajax()) {
            $data = profilPimpinan::where('title', $data)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.profil-pimpinan.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto', function($row){
                    $url= asset('storage/images/profil-pimpinan/'.$row->foto);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'profil', 'foto'])
                ->make(true);
        }
    }


    public function index()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.index');
    }

    public function indexDekan()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.dekan');
    }

    public function indexSenat()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.senat');
    }

    public function indexKoordinator()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.koordinator');
    }

    public function indexMutu()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.mutu');
    }

    public function indexLain()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.lain');
    }

    public function indexProdi()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.prodi');
    }

    public function indexLaboratorium()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.components.laboratorium');
    }

    public function getDekan(Request $request)
    {
        return $this->getData($request, 1);
    }
    public function getSenat(Request $request)
    {
        return $this->getData($request, 2);
    }
    public function getKoordinator(Request $request)
    {
        return $this->getData($request, 3);
    }
    public function getMutu(Request $request)
    {
        return $this->getData($request, 4);
    }
    public function getLain(Request $request)
    {
        return $this->getData($request, 5);
    }
    public function getProdi(Request $request)
    {
        return $this->getData($request, 6);
    }
    public function getLaboratorium(Request $request)
    {
        return $this->getData($request, 7);
    }
    

    public function create()
    {
        return view('back.pages.superadmin.tentangkami.profilpimpinan.create-edit');
    }

    public function edit($id)
    {
        $data = profilPimpinan::findOrFail($id);
        return view('back.pages.superadmin.tentangkami.profilpimpinan.create-edit',[
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,img[width|height|alt|src]'];
        $request['profil'] = Purify::config($config)->clean($request->profil);

        // Save Image
        $fileName = time() . '.' . $request->foto->getClientOriginalName();
        $request->foto->storeAs('images/profil-pimpinan/', $fileName, 'public');
        $request->foto = $fileName;
        profilPimpinan::create([
            'name' => $request->name,
            'title' => $request->title,
            'kedudukan' => $request->kedudukan,
            'profil' => $request->profil,
            'foto' => $request->foto,
        ]);

        try {
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.profil-pimpinan.index'))->with('success', 'Success saving data!');
    }

    public function update(Request $request, $id)
    {
        $data = profilPimpinan::findOrFail($id);
        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,img[width|height|alt|src]'];
        $request['profil'] = Purify::config($config)->clean($request->profil);

        if ($request->foto != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\profil-pimpinan\\'.$data->foto))) {
                File::delete(public_path('storage\images\profil-pimpinan\\'.$data->foto));
            }
            $fileName=time().'.'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('images/profil-pimpinan/',$fileName,'public');
            $request->foto = $fileName;
        }

        if ($request->foto == null) {
            $request->foto = $data->foto;
        }

        
        try {
            $data->update([
                'name' => $request->name,
                'title' => $request->title,
                'kedudukan' => $request->kedudukan,
                'profil' => $request->profil,
                'foto' => $request->foto,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.profil-pimpinan.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $pimpinan = profilPimpinan::find($id);
        $pimpinan->delete();
        // Delete Image
        if (file_exists(public_path('storage\images\profil-pimpinan\\'.$pimpinan->foto))) {
            File::delete(public_path('storage\images\profil-pimpinan\\'.$pimpinan->foto));
        }
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
