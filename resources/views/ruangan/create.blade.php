@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0">Tambah Ruangan</h4>
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

        <form action="{{ route('ruangan.store') }}" method="POST">

            @csrf

            <label class="form-label">Kode Ruangan</label>
            <input type="text"
                   name="kode_ruangan"
                   class="form-control mb-3"
                   required>

            <label class="form-label">Nama Ruangan</label>
            <input type="text"
                   name="nama_ruangan"
                   class="form-control mb-3"
                   required>

            <label class="form-label">Kapasitas</label>
            <input type="number"
                   name="kapasitas"
                   class="form-control mb-3"
                   required>

            <label class="form-label">Lokasi</label>
            <input type="text"
                   name="lokasi"
                   class="form-control mb-3">

            <label class="form-label">Fasilitas</label>
            <textarea name="fasilitas"
                      class="form-control mb-3"
                      rows="3"></textarea>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('ruangan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection