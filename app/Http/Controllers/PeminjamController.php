<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjams = Peminjam::all();
        return view('peminjam.index', compact('peminjams'));
    }

    public function create()
    {
        return view('peminjam.create');
    }

    public function store(Request $request)
    {
        Peminjam::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'nomor_hp' => $request->nomor_hp,
        ]);

       return redirect()
            ->route('peminjam.index')
            ->with('success', 'Data peminjam berhasil ditambahkan.');
    }

    public function edit(Peminjam $peminjam)
    {
        return view('peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, Peminjam $peminjam)
{
    $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'program_studi' => 'required',
        'nomor_hp' => 'required|numeric'
    ]);

    $peminjam->update([
    'nim' => $request->nim,
    'nama' => $request->nama,
    'program_studi' => $request->program_studi,
    'nomor_hp' => $request->nomor_hp,
]);

    return redirect()
    ->route('peminjam.index')
    ->with('success', 'Data peminjam berhasil diubah.');
}

    public function destroy(Peminjam $peminjam)
    {
        $peminjam->delete();

        return redirect()
    ->route('peminjam.index')
    ->with('success', 'Data peminjam berhasil dihapus.');
    }
}