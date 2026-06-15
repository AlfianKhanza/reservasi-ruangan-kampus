<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Ruangan;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['ruangan','peminjam'])->get();

        return view('reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        $ruangans = Ruangan::all();
        $peminjams = Peminjam::all();

        return view('reservasi.create',
            compact('ruangans','peminjams'));
    }

    public function store(Request $request)
{
    $request->validate([
        'ruangan_id' => 'required',
        'peminjam_id' => 'required',
        'tanggal' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|after:jam_mulai',
        'keperluan' => 'required'
    ],[
        'tanggal.required' => 'Tanggal wajib diisi.',
        'keperluan.required' => 'Keperluan wajib diisi.',
        'jam_mulai.required' => 'Jam mulai wajib diisi.',
        'jam_selesai.required' => 'Jam selesai wajib diisi.',
        'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.'
    ]);

    $cekBentrok = Reservasi::where('ruangan_id', $request->ruangan_id)
        ->where('tanggal', $request->tanggal)
        ->where(function ($query) use ($request) {
            $query->whereBetween('jam_mulai', [
                $request->jam_mulai,
                $request->jam_selesai
            ])
            ->orWhereBetween('jam_selesai', [
                $request->jam_mulai,
                $request->jam_selesai
            ])
            ->orWhere(function ($q) use ($request) {
                $q->where('jam_mulai', '<=', $request->jam_mulai)
                  ->where('jam_selesai', '>=', $request->jam_selesai);
            });
        })
        ->exists();

    if ($cekBentrok) {
        return back()
            ->withInput()
            ->with('error', 'Ruangan sudah digunakan pada jam tersebut.');
    }

    Reservasi::create($request->all());

    return redirect()
        ->route('reservasi.index')
        ->with('success', 'Data reservasi berhasil ditambahkan.');
}

    public function edit(Reservasi $reservasi)
    {
        $ruangans = Ruangan::all();
        $peminjams = Peminjam::all();

        return view('reservasi.edit',
            compact('reservasi','ruangans','peminjams'));
    }

    public function update(Request $request, Reservasi $reservasi)
{
    $request->validate([
        'ruangan_id' => 'required',
        'peminjam_id' => 'required',
        'tanggal' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|after:jam_mulai',
        'keperluan' => 'required'
    ],[
        'tanggal.required' => 'Tanggal wajib diisi.',
        'keperluan.required' => 'Keperluan wajib diisi.',
        'jam_mulai.required' => 'Jam mulai wajib diisi.',
        'jam_selesai.required' => 'Jam selesai wajib diisi.',
        'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.'
    ]);

    $reservasi->update($request->all());

return redirect()
    ->route('reservasi.index')
    ->with('success', 'Data reservasi berhasil diubah.');
}

    public function destroy(Reservasi $reservasi)
{
    $reservasi->delete();

    return redirect()
        ->route('reservasi.index')
        ->with('success', 'Data reservasi berhasil dihapus.');
}

public function cekBentrok(Request $request)
{
    $cekBentrok = Reservasi::where('ruangan_id', $request->ruangan_id)
        ->where('tanggal', $request->tanggal)
        ->where(function ($query) use ($request) {

            $query->whereBetween('jam_mulai', [
                $request->jam_mulai,
                $request->jam_selesai
            ])

            ->orWhereBetween('jam_selesai', [
                $request->jam_mulai,
                $request->jam_selesai
            ])

            ->orWhere(function ($q) use ($request) {

                $q->where('jam_mulai', '<=', $request->jam_mulai)
                  ->where('jam_selesai', '>=', $request->jam_selesai);

            });

        })
        ->exists();

    return response()->json([
        'bentrok' => $cekBentrok
    ]);
}


}