@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">Data Ruangan</h4>

        <a href="{{ route('ruangan.create') }}"
           class="btn btn-primary">
            + Tambah Ruangan
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Fasilitas</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($ruangans as $ruangan)

                <tr>
                    <td>{{ $ruangan->kode_ruangan }}</td>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>{{ $ruangan->lokasi }}</td>
                    <td>{{ $ruangan->fasilitas }}</td>

                    <td>

                        <a href="{{ route('ruangan.edit', $ruangan->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('ruangan.destroy', $ruangan->id) }}"
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
                    <td colspan="6" class="text-center">
                        Belum ada data ruangan
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection