<?php

namespace App\Http\Controllers\Back\Admin\InformasiUmum;

use App\Http\Controllers\Controller;
use App\Models\informasi_prodi;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class InformasiUmumController extends Controller
{

    private function baseCheck()
    {
        if (!(informasi_prodi::where('prodi_id', $this->prodiId())->first())) {

            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => 'Gelar dan Strata',
                'value' => '',
            ]);

            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => 'Durasi Studi',
                'value' => '',
            ]);

            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => 'Kampus',
                'value' => '',
            ]);

            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => 'Akreditasi',
                'value' => '',
            ]);

            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => 'Link',
                'value' => '',
            ]);
        }
    }

    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = informasi_prodi::where('prodi_id', $this->prodiId())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    if (!($row->header == 'Kampus' || $row->header == 'Akreditasi' || $row->header == 'Durasi Studi' || $row->header == 'Gelar dan Strata' || $row->header == 'Link')) {
                        $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="window.confirm("Are you sure?");" ><i class="fas fa-trash fa-fw"></i></a>';
                    }
                    $btn = $btn . '<a href="' . route('admin.informasi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'value'])
                ->make(true);
        }
    }

    public function index()
    {
        $this->baseCheck();
        return view('back.pages.admin.informasi.index');
    }

    public function create()
    {
        return view('back.pages.admin.informasi.create-edit');
    }

    public function store(Request $request)
    {
        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['value'] = Purify::config($config)->clean($request->value);

        try {
            informasi_prodi::create([
                'prodi_id' => $this->prodiId(),
                'header' => $request->header,
                'value' => $request->value,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.informasi.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        try {
            $data = informasi_prodi::findOrFail($id);
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }
            return view('back.pages.admin.informasi.create-edit', [
                'data' => $data,
            ]);
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = informasi_prodi::findOrFail($id);

            //check prodi
            if ($this->prodiId() != $data->prodi_id) {
                return back()->with('errorNotFound', 'Data not found');
            }

            // Purify Unknown Script
            $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
            $request['value'] = Purify::config($config)->clean($request->value);

            try {
                $data->update([
                    'prodi_id' => $this->prodiId(),
                    'header' => $request->header,
                    'value' => $request->value,
                ]);
            } catch (\Throwable$th) {
                return back()->with('error', 'Error when submit to system');
            }
            return redirect(route('admin.informasi.index'))->with('success', 'Success saving data!');
        } catch (\Throwable$th) {
            return back()->with('errorNotFound', 'Data not found');
        }
    }

    public function hapus(Request $request)
    {
        $data = informasi_prodi::findOrFail($request->id);

        //check prodi
        if ($this->prodiId() != $data->prodi_id) {
            return back()->with('errorNotFound', 'Data not found');
        }

        $data->delete();
        return redirect(route('admin.informasi.index'))->with('delete', 'Success delete data!');
    }

}
