<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Peminjam;
use App\Models\Reservasi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahRuangan = Ruangan::count();
        $jumlahReservasi = Reservasi::count();

        // Ruangan tersedia
        $ruanganTersedia = $jumlahRuangan - $jumlahReservasi;

        if ($ruanganTersedia < 0) {
            $ruanganTersedia = 0;
        }

        $ruanganTerbaru = Ruangan::latest()
            ->take(5)
            ->get();

        $peminjamTerbaru = Peminjam::latest()
            ->take(5)
            ->get();

        $reservasiTerbaru = Reservasi::with([
            'ruangan',
            'peminjam'
        ])
        ->latest()
        ->take(5)
        ->get();

        return view('dashboard', compact(
            'jumlahRuangan',
            'jumlahReservasi',
            'ruanganTersedia',
            'ruanganTerbaru',
            'peminjamTerbaru',
            'reservasiTerbaru'
        ));
    }
}