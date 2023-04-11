<?php

namespace App\Http\Controllers\Back\Superadmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\Settings\UserForm;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('back.pages.superadmin.settings.user.index');
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('role:id,name')->where('role_id', '!=', 2)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.settings.user.edit',$row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="'. $row->id .'" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function getAdmin(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('prodi:id,name')->where('role_id', '=', 2)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group">';
                    $btn = $btn . '<a href="' . route('superadmin.settings.user.edit',$row->id) . '" class="btn btn-dark buttons-edit"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '<a href="" id="'. $row->id .'" class="hapus btn btn-danger "><i class="fas fa-trash fa-fw"></i></a>';
                    $btn = $btn . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
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
        return view('back.pages.superadmin.settings.user.create-edit',[
            'roles' => Role::all(),
            'prodis' => Prodi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['password'] = Hash::make($data['password']);
        try {
            User::create($data);
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.settings.user.index'))->with('success', 'Success saving data!');
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
        $data = User::with('role:id,name')->findOrFail($id);
        return view('back.pages.superadmin.settings.user.create-edit',[
            'roles' => Role::all(),
            'prodis' => Prodi::all(),
            'data' => $data
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
        $data = User::findOrFail($id);
        if ($request['password'] === null) {
            $request['password'] = $data['password'];
        } else {
            $request['password'] = Hash::make($request['password']);
        }
        
        try {
            $data->update($request->all());
            // Prodi::create($request->all());
        } catch (\Throwable $th) {
            return back()->with('error', 'Error when submit to system');
        }
        return redirect(route('superadmin.settings.user.index'))->with('success', 'Success saving data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bagian = User::findOrFail($id);
            $bagian->update(['status' => '0']);
        } catch (\Throwable $th) {
            return response(['error' => 'Something went wrong']);
        }
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
