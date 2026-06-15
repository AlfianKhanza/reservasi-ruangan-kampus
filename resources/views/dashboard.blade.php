@extends('layouts.app')

@section('content')

<!-- Banner Welcome -->
<div class="card border-0 shadow-sm mb-4 overflow-hidden">
    <div class="card-body p-4 text-white"
         style="background: linear-gradient(135deg,#2196f3,#0d47a1); border-radius:15px;">

        <div class="row align-items-center">

            <div class="col-md-8">
                <h2 class="fw-bold mb-2">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h2>

                <p class="mb-0 fs-5">
                    Sistem Reservasi Ruangan Kampus
                </p>
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">

                <h1 id="clock" class="fw-bold mb-1">
                    00:00:00
                </h1>

                <span id="tanggal">
                    Loading...
                </span>

            </div>

        </div>

    </div>
</div>

<!-- Statistik -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">

                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                     style="width:70px;height:70px;font-size:30px;">
                    🏢
                </div>

                <div class="ms-3">
                    <small class="text-muted">
                        Jumlah Ruangan
                    </small>

                    <h2 class="fw-bold">
                        {{ $jumlahRuangan }}
                    </h2>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">

                <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center"
                     style="width:70px;height:70px;font-size:30px;">
                    📋
                </div>

                <div class="ms-3">
                    <small class="text-muted">
                        Jumlah Reservasi
                    </small>

                    <h2 class="fw-bold">
                        {{ $jumlahReservasi }}
                    </h2>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">

                <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center"
                     style="width:70px;height:70px;font-size:30px;">
                    🏫
                </div>

                <div class="ms-3">
                    <small class="text-muted">
                        Ruangan Tersedia
                    </small>

                    <h2 class="fw-bold">
                        {{ $ruanganTersedia }}
                    </h2>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Reservasi + Kalender -->
<div class="row mb-4">

    <div class="col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white">
                <strong>Reservasi Terbaru</strong>
            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Peminjam</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($reservasiTerbaru as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->peminjam->nama }}</td>
                        <td>{{ $item->tanggal }}</td>
                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-white">
                <strong>Kalender Reservasi</strong>
            </div>

            <div class="card-body text-center">

                <h3 class="fw-bold mb-3">
                    Kalender Reservasi Aktif
                </h3>

                <p class="text-muted">
                    Klik tombol di bawah untuk melihat seluruh jadwal reservasi ruangan.
                </p>

                <a href="{{ url('/kalender') }}"
                   class="btn btn-primary btn-lg">
                    📅 Buka Kalender Reservasi
                </a>

            </div>

        </div>

    </div>

</div>

<!-- Data -->
<div class="row">

    <div class="col-md-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white d-flex justify-content-between">
                <strong>Data Ruangan</strong>

                <a href="{{ route('ruangan.create') }}"
                   class="btn btn-success btn-sm">
                    + Tambah
                </a>
            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($ruanganTerbaru as $item)

                    <tr>
                        <td>{{ $item->kode_ruangan }}</td>
                        <td>{{ $item->nama_ruangan }}</td>
                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white d-flex justify-content-between">
                <strong>Data Peminjam</strong>

                <a href="{{ route('peminjam.create') }}"
                   class="btn btn-success btn-sm">
                    + Tambah
                </a>
            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($peminjamTerbaru as $item)

                    <tr>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white d-flex justify-content-between">
                <strong>Data Reservasi</strong>

                <a href="{{ route('reservasi.create') }}"
                   class="btn btn-success btn-sm">
                    + Tambah
                </a>
            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <thead>
                    <tr>
                        <th>Ruangan</th>
                        <th>Peminjam</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($reservasiTerbaru as $item)

                    <tr>
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->peminjam->nama }}</td>
                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<footer class="text-center text-muted mt-4 mb-3">
    © 2026 Reservasi Ruangan Kampus. All rights reserved.
</footer>

<script>

function updateClock()
{
    const now = new Date();

    document.getElementById('clock').innerHTML =
        now.toLocaleTimeString('id-ID');

    document.getElementById('tanggal').innerHTML =
        now.toLocaleDateString('id-ID',{
            weekday:'long',
            day:'numeric',
            month:'long',
            year:'numeric'
        });
}

setInterval(updateClock,1000);
updateClock();

</script>

@endsection