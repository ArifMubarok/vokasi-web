<?php

namespace App\Http\Controllers\Back\Superadmin\TentangKami;

use App\Models\pages;
use App\Models\konten;
use App\Models\page_konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = konten::where('name', 'struktur-organisasi')->first();
        return view('back.pages.superadmin.tentangkami.strukturorganisasi.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('back.pages.superadmin.tentangkami.strukturorganisasi.create-edit');
    }

    public function store(Request $request)
    {
        if (!pages::where('name', 'struktur-organisasi')->first()) {
            pages::create([
                'name' => 'struktur-organisasi'
            ]);

            konten::create([
                'name' => 'struktur-organisasi',
                'value' => ''
            ]);

            $id = konten::where('name', 'struktur-organisasi')->first()->id;
            page_konten::create([
                'pages_name' => 'struktur-organisasi',
                'konten_id' => $id
            ]);
        }

        // Saving Image
        $fileName=time().'.'.$request->foto->getClientOriginalName();
        $request->foto->storeAs('images/struktur-organisasi/',$fileName, 'public');
        $request->foto = $fileName;

        try {
            konten::where('name', 'struktur-organisasi')->update([
                'value' => $request->foto
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.struktur-organisasi.index'))->with('success', 'Success saving data!');
    }

    public function edit($id)
    {
        $data = konten::where('id', $id)->first();
        return view('back.pages.superadmin.tentangkami.strukturorganisasi.create-edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = konten::findOrFail($id);
        if ($request->foto != null) {
            // Delete old file and Saving Image
            if (file_exists(public_path('storage\images\struktur-organisasi\\'.$data->value))) {
                File::delete(public_path('storage\images\struktur-organisasi\\'.$data->value));
            }
            $fileName=time().'.'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('images/struktur-organisasi/',$fileName,'public');
            $request->foto = $fileName;
        }

        if ($request->foto == null) {
            $request->foto = $data['value'];
        }

        try {
            $data->update([
                'value' => $request->foto
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.tentangkami.struktur-organisasi.index'))->with('success', 'Success saving data!');
    }
}
