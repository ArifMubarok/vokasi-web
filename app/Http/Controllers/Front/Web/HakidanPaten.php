<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\hakiProdiModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HakidanPaten extends Controller
{
    public function index()
    {
        return view('front.produk.haki-dan-paten');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = hakiProdiModel::with(['prodi', 'grup'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
