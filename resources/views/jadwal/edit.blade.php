@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Jadwal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ route('jadwal.index') }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
        </ol>

        @if (\Session::has('notif'))
        <div class="alert alert-primary text-center">
            {!! \Session::get('notif') !!}
        </div>
        @endif

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
            <div class="card-body">
                <form action="{{ route('jadwal.update', $jadwal->uuid) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $d)
                            <option value="{{ $d->id }}" {{ $jadwal->dokter_id == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pasien_id">Pasien</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach ($pasien as $p)
                            <option value="{{ $p->id }}" {{ $jadwal->pasien_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tarif_id">Tarif</label>
                        <select name="tarif_id" class="form-control" required>
                            <option value="">-- Pilih Tarif --</option>
                            @foreach ($tarif as $t)
                            <option value="{{ $t->id }}" {{ $jadwal->tarif_id == $t->id ? 'selected' : '' }}>
                                {{ $t->layanan->nama }}
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
                            <input type="time" name="waktu" value="{{ $jadwal->waktu }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
@endsection