<?php

namespace App\Http\Controllers;

use App\Models\PerguruanTinggi;
use App\Models\Prodi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PerguruanTinggiController extends Controller
{
    public function index()
    {
        $perguruanTinggis = PerguruanTinggi::all();
        return view('tambah-perguruan-tinggi.index', compact('perguruanTinggis'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        // Tampilkan form untuk membuat perguruan tinggi baru
        return view('tambah-perguruan-tinggi.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            'nama_pt' => 'required',
            'prodi_id' => 'required',
        ]);

        // Buat perguruan tinggi baru dengan data yang diterima
        PerguruanTinggi::create($request->all());

        // Redirect ke halaman index atau halaman lain yang sesuai
        return redirect()->route('tambah-perguruan-tinggi.index')->with('success', 'Perguruan Tinggi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data perguruan tinggi dengan ID yang sesuai
        $perguruanTinggi = PerguruanTinggi::find($id);
        $prodis = Prodi::all(); // Mengambil daftar program studi dari model Prodi
        return view('tambah-perguruan-tinggi.edit', compact('perguruanTinggi', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            'nama_pt' => 'required',
            'prodi_id' => 'required',
        ]);

        // Temukan perguruan tinggi yang akan diupdate
        $perguruanTinggi = PerguruanTinggi::find($id);

        // Update perguruan tinggi dengan data yang diterima
        $perguruanTinggi->update($request->all());

        // Redirect ke halaman index atau halaman lain yang sesuai
        return redirect()->route('tambah-perguruan-tinggi.index')->with('success', 'Perguruan Tinggi berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Temukan dan hapus perguruan tinggi dengan ID yang sesuai
        $perguruanTinggi = PerguruanTinggi::find($id);
        $perguruanTinggi->delete();

        // Redirect ke halaman index atau halaman lain yang sesuai
        return redirect()->route('tambah-perguruan-tinggi')->with('success', 'Perguruan Tinggi berhasil dihapus.');
    }
}
