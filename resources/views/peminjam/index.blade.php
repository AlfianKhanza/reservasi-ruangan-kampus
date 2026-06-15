@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">Data Peminjam</h4>

        <a href="{{ route('peminjam.create') }}"
           class="btn btn-warning text-dark fw-bold">
            + Tambah Peminjam
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>No HP</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($peminjams as $peminjam)

                <tr>
                    <td>{{ $peminjam->nim }}</td>
                    <td>{{ $peminjam->nama }}</td>
                    <td>{{ $peminjam->program_studi }}</td>
                    <td>{{ $peminjam->no_hp }}</td>

                    <td>

                        <a href="{{ route('peminjam.edit', $peminjam->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('peminjam.destroy', $peminjam->id) }}"
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
                    <td colspan="5" class="text-center">
                        Belum ada data peminjam
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection