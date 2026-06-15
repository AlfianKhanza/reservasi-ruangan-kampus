@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">Data Reservasi</h4>

        <a href="{{ route('reservasi.create') }}"
           class="btn btn-success">
            + Tambah Reservasi
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Peminjam</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keperluan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($reservasis as $reservasi)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $reservasi->ruangan->nama_ruangan }}
                    </td>

                    <td>
                        {{ $reservasi->peminjam->nama }}
                    </td>

                    <td>
                        {{ $reservasi->tanggal }}
                    </td>

                    <td>
                        {{ $reservasi->jam_mulai }}
                        -
                        {{ $reservasi->jam_selesai }}
                    </td>

                    <td>
                        {{ $reservasi->keperluan }}
                    </td>

                    <td>

                        <a href="{{ route('reservasi.edit',$reservasi->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('reservasi.destroy',$reservasi->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada data reservasi
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection