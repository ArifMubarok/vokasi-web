<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BukuPedoman as ModelsBukuPedoman;
use Illuminate\Http\Request;

class bukuPedoman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelsBukuPedoman::latest()->get();
        return view('front.layanan.akademik.buku-pedoman', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = ModelsBukuPedoman::where('name', $name)->first();
        // file path
        // $path = asset('storage/content/buku-pedoman/file/'.$data->file);
        $path = public_path('storage/content/buku-pedoman/file/' . $data->file);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->name . '"',
        ];
        return response()->file($path, $header);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}