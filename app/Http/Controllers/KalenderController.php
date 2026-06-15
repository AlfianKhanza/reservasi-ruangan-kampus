<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;

class KalenderController extends Controller
{
    public function index()
    {
        $events = [];

        $reservasi = Reservasi::with(['ruangan', 'peminjam'])->get();

        foreach ($reservasi as $r) {

            $events[] = [

                'title' => $r->ruangan->nama_ruangan,

                'start' => $r->tanggal,

                'extendedProps' => [

                    'ruangan' => $r->ruangan->nama_ruangan ?? '-',

                    'peminjam' => $r->peminjam->nama ?? '-',

                    'jam_mulai' => $r->jam_mulai ?? '-',

                    'jam_selesai' => $r->jam_selesai ?? '-',

                    'keperluan' => $r->keperluan ?? '-',

                ]

            ];
        }

        return view('kalender.index', compact('events'));
    }
}