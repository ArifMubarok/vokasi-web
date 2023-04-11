<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\konten;
use App\Models\page_konten;
use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class kerjasamaController extends Controller
{
    public function index()
    {
        $deskripsi = $this->deskripsi();
        $gambar = $this->gambar();
        $link = $this->link();
        return view('back.pages.superadmin.beranda.kerjasama.index', [
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'link' => $link
        ]);
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = kerjasama::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.tentangkami.kerjasama.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('link', function ($row) {
                    $a = '<a href="' . $row->link . '" target="_blank" rel="noopener noreferrer">' . $row->link . '</a>';
                    return $a;
                })
                ->editColumn('logo', function($row){
                    $url = asset('storage/images/kerjasama/'.$row->logo);
                    $img = '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                    return $img;
                })
                ->rawColumns(['action', 'logo', 'link'])
                ->make(true);
        }
    }

    public function create()
    {
        
        return view('back.pages.superadmin.beranda.kerjasama.create-edit');
    }

    public function store(Request $request)
    {
        // Saving Image
        $fileName = time() . '.' . $request->logo->getClientOriginalName();
        $request->logo->storeAs('images/kerjasama', $fileName, 'public');
        $request->logo = $fileName;

        kerjasama::create([
            'logo' => $request->logo,
            'instansi' => $request->instansi,
            'link' => $request->link,
        ]);
        try {
            
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.kerjasama.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = kerjasama::findOrFail($id);
        return view('back.pages.superadmin.beranda.kerjasama.create-edit', [
            'data' => $data,
        ]);
    }

    public function deskripsiedit()
    {
        return ;
    }

    private function deskripsi()
    {
        // dd((pages::where('name', 'kerjasama')->first()) === null);
        if ((pages::where('name', 'kerjasama')->first()) == null) {
            pages::create([
                'name' => 'kerjasama'
            ]);


            konten::create([
                'name' => 'deskripsi-kerjasama',
                'value' => ''
            ]);
            $iddeskripsi = konten::where('name', 'deskripsi-kerjasama')->first()->id;
            page_konten::create([
                'pages_name' => 'kerjasama',
                'konten_id' => $iddeskripsi
            ]);
            
            konten::create([
                'name' => 'gambar-kerjasama',
                'value' => ''
            ]);
            $idgambar = konten::where('name', 'gambar-kerjasama')->first()->id;
            page_konten::create([
                'pages_name' => 'kerjasama',
                'konten_id' => $idgambar
            ]);

            konten::create([
                'name' => 'link-kerjasama',
                'value' => ''
            ]);
            $idlink = konten::where('name', 'link-kerjasama')->first()->id;
            page_konten::create([
                'pages_name' => 'kerjasama',
                'konten_id' => $idlink
            ]);
        }
        $deskId = konten::where('name', 'deskripsi-kerjasama')->first()->id;
        return page_konten::where('pages_name', 'kerjasama')->where('konten_id', $deskId)->with('konten')->first();
    }

    private function link()
    {
        $linkkerjasamaId = konten::where('name', 'link-kerjasama')->first()->id;
        return page_konten::where('pages_name', 'kerjasama')->where('konten_id', $linkkerjasamaId)->with('konten')->first();
    }
    private function gambar()
    {
        $gambarkerjasamaId = konten::where('name', 'gambar-kerjasama')->first()->id;
        return page_konten::where('pages_name', 'kerjasama')->where('konten_id', $gambarkerjasamaId)->with('konten')->first();
    }

    public function update(Request $request, $id)
    {
        $data = kerjasama::findOrFail($id);

        // Delete old file and Saving Image
        if ($request->logo != null) {
            if (file_exists(public_path('storage\images\kerjasama\\' . $data->logo))) {
                File::delete(public_path('storage\images\kerjasama\\' . $data->logo));
            }
            $fileName = time() . '.' . $request->logo->getClientOriginalName();
            $request->logo->storeAs('images/kerjasama', $fileName, 'public');
            $request->logo = $fileName;
        }
        if ($request->logo == null) {
            $request->logo = $data->logo;
        }

        
        try {
            $data->update([
                'logo' => $request->logo,
                'instansi' => $request->instansi,
                'link' => $request->alamat,
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.kerjasama.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = kerjasama::findOrFail($id);
        $data->delete();

        return response()->json(['text' => 'berhasil dihapus'], 200);
    }

    public function editGambar($id)
    {
        $view = 'back.pages.superadmin.tentangkami.kerjasama.editgambar';
        return $this->editData($id, $view);
    }
    public function editDeskripsi($id)
    {
        $view = 'back.pages.superadmin.tentangkami.kerjasama.editdeskripsi';
        return $this->editData($id, $view);
    }
    public function editLink($id)
    {
        $view = 'back.pages.superadmin.tentangkami.kerjasama.editlink';
        return $this->editData($id, $view);
    }

    public function editData($id, $view)
    {
        $data = konten::where('id', $id)->first();
        return view($view,[
            'data' => $data
        ]);
    }

    public function updateData(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        if ($request->submitbutton == "Update Picture") {
            if ($request->value != null) {
                // Delete old file and Saving Image
                if (file_exists(public_path('storage/images/kerjasama/' . $data->value))) {
                    File::delete(public_path('storage/images/kerjasama/' . $data->value));
                }
                $fileName = time() . '.' . $request->value->getClientOriginalName();
                $request->value->storeAs('images/kerjasama/', $fileName, 'public');
                $request->value = $fileName;
            }

            if ($request->value == null) {
                $request->value = $data->value;
            }
        }
        try {
            $data->update([
                'value' => $request->value
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.kerjasama.index'))->with('success', 'Success saving data!');
    }
}
