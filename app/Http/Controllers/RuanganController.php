<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required',
            'kapasitas' => 'required|numeric',
            'lokasi' => 'required',
            'fasilitas' => 'required'
        ]);

        Ruangan::create($request->all());

        return redirect()
            ->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required',
            'kapasitas' => 'required|numeric',
            'lokasi' => 'required',
            'fasilitas' => 'required'
        ]);

        $ruangan->update($request->all());

        return redirect()
            ->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil diubah.');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()
            ->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil dihapus.');
    }
}