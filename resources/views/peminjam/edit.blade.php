@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0">Edit Peminjam</h4>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">

            @csrf
            @method('PUT')

            <label class="form-label">NIM</label>
            <input type="text"
                   name="nim"
                   value="{{ $peminjam->nim }}"
                   class="form-control mb-3"
                   required>

            <label class="form-label">Nama</label>
            <input type="text"
                   name="nama"
                   value="{{ $peminjam->nama }}"
                   class="form-control mb-3"
                   required>

            <label class="form-label">Program Studi</label>
            <input type="text"
                   name="program_studi"
                   value="{{ $peminjam->program_studi }}"
                   class="form-control mb-3"
                   required>

            <label class="form-label">No HP</label>
            <input type="text"
                   name="nomor_hp"
                   value="{{ $peminjam->nomor_hp }}"
                   class="form-control mb-3"
                   required>

            <button type="submit"
                    class="btn btn-warning">
                Update
            </button>

            <a href="{{ route('peminjam.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection