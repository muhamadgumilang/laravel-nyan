<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    
    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }

   
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama'     => 'required',
            'nim'      => 'required|unique:mahasiswas',
            'id_dosen' => 'required|exists:dosens,id', 
        ]);

        $mahasiswa           = new Mahasiswa();
        $mahasiswa->nama     = $request->nama;
        $mahasiswa->nim      = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index');
    }

   
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosen = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosen'));
    }   

   
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama'     => 'required',
            'nim'      => 'required|unique:mahasiswas',
            'id_dosen' => 'required|exists:dosens,id', 
        ]);

        $mahasiswa           = Mahasiswa::findOrFail();
        $mahasiswa->nama     = $request->nama;
        $mahasiswa->nim      = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}