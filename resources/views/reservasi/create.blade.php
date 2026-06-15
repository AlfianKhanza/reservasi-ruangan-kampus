@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0">Tambah Reservasi</h4>
    </div>

    <div class="card-body">

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('reservasi.store') }}" method="POST">

            @csrf

            <label class="form-label">Ruangan</label>

            <select name="ruangan_id" class="form-control mb-3">

                @foreach($ruangans as $ruangan)

                <option value="{{ $ruangan->id }}">
                    {{ $ruangan->nama_ruangan }}
                </option>

                @endforeach

            </select>

            <label class="form-label">Peminjam</label>

            <select name="peminjam_id" class="form-control mb-3">

                @foreach($peminjams as $peminjam)

                <option value="{{ $peminjam->id }}">
                    {{ $peminjam->nama }}
                </option>

                @endforeach

            </select>

            <label class="form-label">Tanggal</label>

            <input type="date"
                   name="tanggal"
                   class="form-control mb-3">

            <label class="form-label">Jam Mulai</label>

            <input type="time"
                   name="jam_mulai"
                   class="form-control mb-3">

            <label class="form-label">Jam Selesai</label>

            <input type="time"
                   name="jam_selesai"
                   class="form-control mb-3">

            <label class="form-label">Keperluan</label>

            <textarea name="keperluan"
                      class="form-control mb-3"
                      rows="3"></textarea>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('reservasi.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

</form>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ruangan = document.querySelector('[name="ruangan_id"]');
    const tanggal = document.querySelector('[name="tanggal"]');
    const jamMulai = document.querySelector('[name="jam_mulai"]');
    const jamSelesai = document.querySelector('[name="jam_selesai"]');

    function cekBentrok() {

        if (
            !ruangan.value ||
            !tanggal.value ||
            !jamMulai.value ||
            !jamSelesai.value
        ) {
            return;
        }

        fetch('{{ route("reservasi.cekBentrok") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                ruangan_id: ruangan.value,
                tanggal: tanggal.value,
                jam_mulai: jamMulai.value,
                jam_selesai: jamSelesai.value
            })
        })
        .then(response => response.json())
        .then(data => {

            if (data.bentrok) {
                alert('⚠ Ruangan sudah digunakan pada jam tersebut!');
            }

        });

    }

    ruangan.addEventListener('change', cekBentrok);
    tanggal.addEventListener('change', cekBentrok);
    jamMulai.addEventListener('change', cekBentrok);
    jamSelesai.addEventListener('change', cekBentrok);

});
</script>

@endsection