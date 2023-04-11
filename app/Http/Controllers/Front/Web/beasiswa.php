<?php

namespace App\Http\Controllers\Front\Web;

use App\Http\Controllers\Controller;
use App\Models\BeasiswaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class beasiswa extends Controller
{
    public function index()
    {
        $data = BeasiswaModel::get();
        return view('front.mahasiswa.beasiswa', [
            'data' => $data
        ]);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = BeasiswaModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('link',function($row){
                    $data = '<a href="'.$row->link.'" target="_blank" rel="noopener noreferrer">'.$row->link.'</a>' ;
                    return $data;
                })
                ->rawColumns(['link'])
                ->make(true);
        }
    }
}
