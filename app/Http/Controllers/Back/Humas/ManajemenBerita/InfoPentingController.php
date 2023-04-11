<?php

namespace App\Http\Controllers\Back\Humas\ManajemenBerita;

use App\Http\Controllers\Controller;
use App\Models\InfoPenting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class InfoPentingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InfoPenting::first();
        return view('back.pages.humas.manajemenberita.info-penting.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.humas.manajemenberita.info-penting.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['judul'], '-');

        //WYSIWYG picture
        $storage = "storage/images/info-penting";
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
        $request->foto_header->storeAs('images/info-penting/header', $fileName, 'public');
        $request->foto_header = $fileName;

        try {
            switch ($request->submitbutton) {
                case 'Save as draft':
                    InfoPenting::create([
                        'header' => $request->header,
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status' => '0',
                    ]);
                    break;
                case 'Publish':
                    InfoPenting::create([
                        'header' => $request->header,
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status' => '1',
                    ]);
                    break;
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-berita.info-penting.index'))->with('success', 'Success saving data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InfoPenting::findOrFail($id);
        return view('back.pages.humas.manajemenberita.info-penting.create-edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = InfoPenting::findOrFail($id);
        $request['slug'] = Str::slug($request['judul'], '-');

        $storage = "storage/images/info-penting";
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
            if (file_exists(public_path('storage/images/info-penting/header/' . $data->foto_header))) {
                File::delete(public_path('storage/images/info-penting/header/' . $data->foto_header));
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
                        'header' => $request->header,
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status' => '0',
                    ]);
                    break;
                case 'Publish':
                    $data->update([
                        'header' => $request->header,
                        'judul' => $request->judul,
                        'slug' => $request->slug,
                        'foto_header' => $request->foto_header,
                        'konten' => $request->konten,
                        'status' => '1',
                    ]);
                    break;
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('humas.manajemen-berita.info-penting.index'))->with('success', 'Success saving data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}