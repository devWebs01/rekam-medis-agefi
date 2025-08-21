@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Jadwal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route("jadwal.index") }}">Jadwal</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit Jadwal
            </div>
            <div class="card-body">
                <form action="{{ route("jadwal.update", $jadwal->uuid) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group mb-3">
                        <label for="dokter_id">Dokter</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $d)
                                <option value="{{ $d->id }}" {{ $jadwal->dokter_id == $d->id ? "selected" : "" }}>
                                    {{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="pasien_id">Pasien</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach ($pasien as $p)
                                <option value="{{ $p->id }}" {{ $jadwal->pasien_id == $p->id ? "selected" : "" }}>
                                    {{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tarif_id">Layanan</label>
                        <select name="tarif_id" class="form-control" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach ($tarif as $t)
                                <option value="{{ $t->id }}" {{ $jadwal->tarif_id == $t->id ? "selected" : "" }}>
                                    {{ $t->layanan->nama }} (Rp {{ number_format($t->nominal, 0, ",", ".") }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl">Tanggal</label>
                            <input type="date" name="tgl" value="{{ $jadwal->tgl }}" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu">Waktu</label>
                            <input type="time" name="waktu" value="{{ $jadwal->waktu }}" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route("jadwal.index") }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
