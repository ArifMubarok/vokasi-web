<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\berita_kategori;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;use Intervention\Image\ImageManagerStatic as Image;
use Stevebauman\Purify\Facades\Purify;
// use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PenelitianDosenController extends Controller
{
    private function prodiId()
    {
        return Auth::user()->prodi_id;
    }

    public function index()
    {
        return view('back.pages.admin.penelitian.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $value = 'Penelitian';
            $data = BeritaModel::where('prodi_id', $this->prodiId())->with('berita_kategori.kategori:id,name')
                ->whereHas('berita_kategori.kategori', function ($q) use ($value) {
                    // Query the name field in status table
                    $q->where('name', '=', $value); // '=' is optional
                })->latest()->orderBy('isValidate', 'asc')->get();
            // $data = BeritaModel::where('prodi_id', $this->prodiId())->with('berita_kategori.kategori:id,name')->latest()->orderBy('isValidate', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    if ($row->isValidate == 0) {
                        $btn = $btn . '<a href="' . route('admin.penelitian-dosen.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    }
                    $btn = $btn . '<a href="' . route('admin.penelitian-dosen.show', $row->id) . '" class="btn btn-info buttons-edit"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '<a href="" id="' . $row->id . '" class="hapus btn btn-danger " onclick="return confirm("Are you sure?")"><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('foto_header', function ($row) {
                    $url = asset('storage/images/' . $row->foto_header);
                    return '<img src="' . $url . '" border="0" width="50%" class="img-rounded" align="center" />';
                })
                ->editColumn('konten', function ($row) {
                    $str = Str::words($row->konten, 50);
                    return $str;
                })
                ->editColumn('kategori', function ($row) {
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
                ->editColumn('isValidate', function ($row) {
                    switch ($row->isValidate) {
                        case '1':
                            return 'Sudah tervalidasi';
                            break;

                        default:
                            return 'Belum divalidasi';
                            break;
                    }
                })
                ->rawColumns(['action', 'konten', 'foto_header'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $data = BeritaModel::where('id', $id)->firstOrFail();
        return view('back.pages.admin.penelitian.show', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $kategori = Kategori::where('name', 'Penelitian')->pluck('id')->toArray();
        return view('back.pages.admin.penelitian.create-edit', [
            'kategoris' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['judul'], '-');

        //WYSIWYG picture
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

        // Purify Unknown Script
        $config = ['HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,div,span[style],div[style],h1[style],h2[style],h3[style],h4[style],h5[style],h6[style]'];
        $request['konten'] = Purify::config($config)->clean($dom->saveHTML());

        // Saving Image
        $fileName = time() . '.' . $request->foto_header->getClientOriginalName();
        $request->foto_header->storeAs('images/', $fileName, 'public');
        $request->foto_header = $fileName;

        try {
            BeritaModel::create([
                'prodi_id' => $this->prodiId(),
                'judul' => $request->judul,
                'slug' => $request->slug,
                'foto_header' => $request->foto_header,
                'konten' => $request->konten,
                'status' => '0',
                'isValidate' => '0',
            ]);
            $berita = BeritaModel::where('slug', $request->slug)->first();
            $idBerita = $berita->id;
            foreach ($request->kategori_id as $kategori_id) {
                berita_kategori::create([
                    'kategori_id' => $kategori_id,
                    'berita_id' => $idBerita,
                ]);
            }
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.penelitian-dosen.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = BeritaModel::findOrFail($id);
        $kategori = Kategori::get();
        $kategoriSelected = berita_kategori::where('berita_id', $id)->pluck('kategori_id')->toArray();
        return view('back.pages.admin.penelitian.create-edit', [
            'data' => $data,
            'kategoris' => $kategori,
        ], compact('kategoriSelected'));
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
        $request['konten'] = Purify::config($config)->clean($dom->saveHTML());

        if ($request->foto_header != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\\' . $data->foto_header))) {
                File::delete(public_path('storage\images\\' . $data->foto_header));
            }
            $fileName = time() . '.' . $request->foto_header->getClientOriginalName();
            $request->foto_header->storeAs('images', $fileName, 'public');
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
                        'status' => '0',
                        'isValidate' => '1',
                    ]);
                    $kategoriBerita = berita_kategori::where('berita_id', $id);
                    $kategoriBerita->delete();
                    foreach ($request->kategori_id as $kategori_id) {
                        berita_kategori::create([
                            'kategori_id' => $kategori_id,
                            'berita_id' => $id,
                        ]);
                    }
                    break;
                case 'Publish':
                    $data->update([
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status' => '1',
                        'isValidate' => '1',
                    ]);

                    $kategoriBerita = berita_kategori::where('berita_id', $id);
                    $kategoriBerita->delete();
                    foreach ($request->kategori_id as $kategori_id) {
                        berita_kategori::create([
                            'kategori_id' => $kategori_id,
                            'berita_id' => $id,
                        ]);
                    }
                    break;
            }
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('admin.penelitian-dosen.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $berita = BeritaModel::find($id);
        $berita->delete();
        // Delete Image
        if (file_exists(public_path('storage\images\\' . $berita->foto_header))) {
            File::delete(public_path('storage\images\\' . $berita->foto_header));
        }
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
