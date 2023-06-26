<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PerguruanTinggi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('index', compact('jurusans'));
    }

    public function getProdis(Request $request)
    {
        $prodis = Prodi::where('jurusan_id', $request->jurusan_id)->get();
        return response()->json($prodis);
    }

    public function getPerguruanTinggis(Request $request)
    {
        $perguruanTinggis = PerguruanTinggi::where('prodi_id', $request->prodi_id)->get();
        return response()->json($perguruanTinggis);
    }
}
