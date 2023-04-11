<?php

namespace App\Http\Controllers\humas;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\berita_kategori;
use App\Models\BeritaModel;
use App\Models\Kategori;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Yajra\DataTables\Facades\DataTables;

class ValidasiController extends Controller
{
    public function index()
    {
        return view('back.pages.humas.validasi.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = BeritaModel::with('berita_kategori.kategori:id,name', 'prodi:id,name')->where('prodi_id', true)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('humas.validasi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('humas.validasi.show', $row->id) . '" class="btn btn-info buttons-edit"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto_header', function($row){
                    $url = asset('storage/images/' . $row->foto_header);
                    return '<img src="'.$url.'" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->editColumn('konten', function ($row) {
                    $str = Str::words($row->konten, 50);
                    return $str;
                })
                ->editColumn('kategori', function($row){
                    $display = $row->berita_kategori->pluck('kategori.name')->toArray();
                    return implode(', ', $display);
                })
                ->editColumn('status', function ($row) {
                    switch ($row->status) {
                        case 0:
                            return 'Not Published';
                            break;

                        default:
                            return 'Published';
                            break;
                    }
                })
                ->editColumn('isValidate', function($row){
                    switch ($row->isValidate) {
                        case '1':
                            return 'Sudah tervalidasi';
                            break;
                        
                        default:
                            return 'Belum divalidasi';
                            break;
                    }
                })
                ->rawColumns(['action','konten','foto_header'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $data = BeritaModel::where('id', $id)->firstOrFail();
        return view('back.pages.humas.validasi.show', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $kategori = Kategori::get();
        return view('back.pages.humas.validasi.create-edit', [
            'kategoris' => $kategori,
        ]);
    }

    public function edit($id)
    {
        $data = BeritaModel::findOrFail($id);
        $kategori = Kategori::get();
        $kategoriSelected = berita_kategori::where('berita_id', $id)->pluck('kategori_id')->toArray();
        return view('back.pages.humas.validasi.create-edit', [
            'data' => $data,
            'kategoris' => $kategori
        ],compact('kategoriSelected'));
    }

    public function update(Request $request, $id)
    {
        $data = BeritaModel::findOrFail($id);
        $request['slug'] = Str::slug($request['judul'], '-');

        $storage = "storage/content";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = ("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        //purify script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['konten']=Purify::config($config)->clean($dom->saveHTML());
        
        
        if ($request->foto_header != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\\'.$data->foto_header))) {
                File::delete(public_path('storage\images\\'.$data->foto_header));
            }
            $fileName=time().'.'.$request->foto_header->getClientOriginalName();
            $request->foto_header->storeAs('images',$fileName,'public');
            $request->foto_header = $fileName;
        }

        if ($request->foto_header == null) {
            $request->foto_header = $data->foto_header;
        }
        try {
            switch ($request->submitbutton) {
                case 'Save as draft':
                    $data->update([
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status'=> '0',
                        'isValidate' => '0',
                    ]);
                    $kategoriBerita = berita_kategori::where('berita_id', $id);
                    $kategoriBerita->delete();
                    foreach ($request->kategori_id as $kategori_id) {
                        berita_kategori::create([
                            'kategori_id' => $kategori_id,
                            'berita_id' => $id
                        ]);
                    }
                    break;
                case 'Validasi':
                    $data->update([
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status'=> '1',
                        'isValidate' => '1',
                    ]);

                    $kategoriBerita = berita_kategori::where('berita_id', $id);
                    $kategoriBerita->delete();
                    foreach ($request->kategori_id as $kategori_id) {
                        berita_kategori::create([
                            'kategori_id' => $kategori_id,
                            'berita_id' => $id
                        ]);
                    }
                    break;
                case 'Tidak Tervalidasi':
                    $data->update([
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status'=> '0',
                        'isValidate' => '0',
                    ]);

                    $kategoriBerita = berita_kategori::where('berita_id', $id);
                    $kategoriBerita->delete();
                    foreach ($request->kategori_id as $kategori_id) {
                        berita_kategori::create([
                            'kategori_id' => $kategori_id,
                            'berita_id' => $id
                        ]);
                    }
                    break;
                }
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.validasi.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $berita = BeritaModel::find($id);
        $berita->delete();
        // Delete Image
        if (file_exists(public_path('storage\images\\'.$berita->foto_header))) {
            File::delete(public_path('storage\images\\'.$berita->foto_header));
        }
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
