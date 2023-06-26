<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PerguruanTinggi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function showForm()
    {
        $jurusans = Jurusan::all();
        return view('form', compact('jurusans'));
    }

    public function getPerguruanTinggi(Request $request)
    {
        $prodiId = $request->input('prodi');
        $perguruanTinggis = PerguruanTinggi::where('prodi_id', $prodiId)->get();
        return view('perguruan-tinggi', compact('perguruanTinggis'));
    }
}
