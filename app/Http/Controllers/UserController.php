<?php

namespace App\Http\Controllers;

use App\Models\PerguruanTinggi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Menambahkan middleware auth untuk memeriksa apakah pengguna sudah login
        $this->middleware('check_payment')->except('index'); // Menambahkan middleware custom untuk memeriksa pembayaran, kecuali untuk metode index
    }
    public function dashboard()
    {
        return view('user.home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function getPerguruanTinggi(Request $request)
    {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $user->status_pembayaran = true; // Atau nilai yang sesuai dengan logika Anda
        //     $user->save();

        //     // Logika lain yang diperlukan setelah pembayaran berhasil
        // }
        // $jurusan = $request->input('jurusan');
        $programStudi = $request->input('program_studi');
        $prodiId = $request->input('prodi');
        $perguruanTinggis = PerguruanTinggi::where('prodi_id', $prodiId)->get();

        return view('/user/perguruan-tinggi', compact('perguruanTinggis'));
    }
}
