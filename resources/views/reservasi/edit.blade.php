<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Reservasi</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label>Ruangan</label>

            <select name="ruangan_id" class="form-control">
                @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}"
                        {{ $reservasi->ruangan_id == $ruangan->id ? 'selected' : '' }}>
                        {{ $ruangan->nama_ruangan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Peminjam</label>

            <select name="peminjam_id" class="form-control">
                @foreach($peminjams as $peminjam)
                    <option value="{{ $peminjam->id }}"
                        {{ $reservasi->peminjam_id == $peminjam->id ? 'selected' : '' }}>
                        {{ $peminjam->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="{{ $reservasi->tanggal }}">
        </div>

        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time"
                   name="jam_mulai"
                   class="form-control"
                   value="{{ $reservasi->jam_mulai }}">
        </div>

        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time"
                   name="jam_selesai"
                   class="form-control"
                   value="{{ $reservasi->jam_selesai }}">
        </div>

        <div class="mb-3">
            <label>Keperluan</label>
            <textarea name="keperluan"
                      class="form-control">{{ $reservasi->keperluan }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('reservasi.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>