<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\PerguruanTinggi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('home', compact('jurusans'));
    }
    public function showForm()
    {
        $jurusans = Jurusan::all();
        return view('home', compact('jurusans'));
    }


    public function adminIndex()
    {
        return view('admin.home');
    }

    public function userIndex()
    {
        return view('user.home');
    }
}
