<?php

namespace App\Http\Controllers\Back\Superadmin\Produk;

use App\Http\Controllers\Controller;
use App\Models\konferensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KonferensiController extends Controller
{
    public function index()
    {
        return view('back.pages.superadmin.produk.konferensi.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = konferensi::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.produk.konferensi.edit', $row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a  id="' . $row->id . '" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->editColumn('link', function($row) {
                    return '<a href="' . $row->link . '" target="_blank" rel="noopener noreferrer">'. $row->link .'</a>';
                })
                ->rawColumns(['action', 'link'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.superadmin.produk.konferensi.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        konferensi::create([
            'name' => $request->name,
            'link' => $request->link,
            'program_studi' => $request->program_studi,
            'deskripsi' => $request->deskripsi
        ]);
        try {
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.produk.konferensi.index'))->with('success', 'Success saving data!');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = konferensi::findOrFail($id);
        return view('back.pages.superadmin.produk.konferensi.create-edit', [
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
        try {
            $data = konferensi::firstOrFail();
            $data->update([
                'name' => $request->name,
                'link' => $request->link,
                'program_studi' => $request->program_studi,
                'deskripsi' => $request->deskripsi
            ]);
        } catch (\Throwable$th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.produk.konferensi.index'))->with('success', 'Success saving data!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = konferensi::where('id', $id)->firstOrFail();
        $data->delete();

        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
