<?php

namespace App\Http\Controllers\Front\Web;

// use App\Models\konten;
// use App\Models\page_konten;
use App\Models\DokumensvModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokumenSV extends Controller
{
    public function index()
    {
        $data = DokumensvModel::latest()->get();
        return view('front.layanan.download-dokumen', [
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = DokumensvModel::where('name', $name)->first();
        // file path
        // $path = asset('storage/content/dokumen/file/'.$data->file);
        $path = public_path('storage/content/dokumen/file/' . $data->file);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->name . '"',
        ];
        return response()->file($path, $header);
    }
}