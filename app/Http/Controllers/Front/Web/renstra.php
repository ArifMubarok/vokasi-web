<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\konten;
use App\Models\RenstraModel;
use App\Models\page_konten;

class renstra extends Controller
{
    public function index()
    {
        $data = RenstraModel::latest()->get();
        return view('front.tentang-kami.renstra-sv-uns', [
            'data' => $data
        ]);
    }

    public function show($name)
    {
        $data = RenstraModel::where('name', $name)->first();
        // file path
        // $path = asset('storage/content/renstra/file/'.$data->file);
        $path = public_path('storage/content/renstra/file/' . $data->file);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->name . '"',
        ];
        return response()->file($path, $header);
    }
}
