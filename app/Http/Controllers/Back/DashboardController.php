<?php

namespace App\Http\Controllers\Back;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $prodi = Prodi::where('id', Auth::user()->prodi_id)->first();
        return view('back.dashboard',[
            'prodi' => $prodi,
        ]);
    }
}
