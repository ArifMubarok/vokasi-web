<?php

namespace App\Http\Controllers\Back\Superadmin\Settings;

use App\Models\Prodi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tingkat_prodi;
use App\DataTables\ProdiDataTable;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Superadmin\Settings\ProdiForm;
use App\Models\Detail_prodi;
use Illuminate\Support\Facades\File;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.superadmin.settings.prodi.index');
    }

    public function getProdi(Request $request)
    {
        if ($request->ajax()) {
            $data = Prodi::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.settings.prodi.edit',$row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="'. $row->id .'" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('logo',function($row){
                    $url = asset('storage/settings/prodi/logo/'.$row->logo);
                    if (isset($row->logo)) {
                        return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                    } else {
                        $defaultimg = asset('home-estate/images/blog/b-4.jpg');
                        return '<img src="'.$defaultimg.'" border="0" width="50%" class="img-rounded" align="center" />';
                    }
                })
                ->rawColumns(['action', 'logo'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.superadmin.settings.prodi.create-edit',[
            'tingkats' => Tingkat_prodi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdiForm $request)
    {
        $request['slug'] = Str::slug("D" . $request['tingkat'] ." ". $request['name'], '-');
        $fileName = time().'.'.$request->file('logo')->getClientOriginalName();
        $request->logo->storeAs('settings/prodi/logo/', $fileName, 'public');
        $request->logo = $fileName;

        Prodi::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'tingkat' => $request->tingkat,
            'logo' => $request->logo,
        ]);
        try {
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.settings.prodi.index'))->with('success', 'Success saving data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Prodi::findOrFail($id);
        return view('back.pages.superadmin.settings.prodi.create-edit',[
            'tingkats' => Tingkat_prodi::all(),
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(ProdiForm $request, $id)
    {
        $data = Prodi::findOrFail($id);
        $request['slug'] = Str::slug("D" . $request['tingkat'] ." ". $request['name'], '-');
        try {
            if ($request->logo != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('settings/prodi/logo/' . $data->logo))) {
                    File::delete(public_path('settings/prodi/logo/' . $data->logo));
                }
                $fileName = time().'.'.$request->file('logo')->getClientOriginalName();
                $request->logo->storeAs('settings/prodi/logo/', $fileName, 'public');
                $request->logo = $fileName;
            }

            if ($request->logo == null) {
                $request->logo = $data->logo;
            }
            $data->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'tingkat' => $request->tingkat,
                'logo' => $request->logo,
            ]);
            // Prodi::create($request->all());
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.settings.prodi.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $prodi = Prodi::find($id);
        $prodi->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
