<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\JurnalModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Jurnal extends Controller
{
    public function index()
    {
        return view('front.produk.jurnal');
    }

    public function getTerakreditasi(Request $request)
    {
        if ($request->ajax()) {
            $data = JurnalModel::whereNotNull('terakreditasi')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function getBelumTerakreditasi(Request $request)
    {
        if ($request->ajax()) {
            $data = JurnalModel::whereNull('terakreditasi')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }


}
