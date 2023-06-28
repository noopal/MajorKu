<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('prodi.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'jurusan_id' => 'required',
        ]);

        Prodi::create($request->all());

        return redirect()->route('prodi.index')
            ->with('success', 'Prodi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::find($id);
        $jurusans = Jurusan::all();

        return view('prodi.edit', compact('prodi', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'jurusan_id' => 'required',
        ]);

        $prodi = Prodi::find($id);
        $prodi->update($request->all());

        return redirect()->route('prodi.index')
            ->with('success', 'Prodi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);

        return redirect()->route('prodi.index')
            ->with('success', 'Prodi deleted successfully.');
    }
}
