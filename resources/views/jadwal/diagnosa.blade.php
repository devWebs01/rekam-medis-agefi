@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Diagnosa</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ url('/jadwal') }}">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('/jadwal') }}">Jadwal</a></li>
        </ol>

        @if (session('notif'))
        <div class="alert alert-primary text-center">
            {!! session('notif') !!}
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

        <div class="card mb-4">
            <div class="card-body">
                <form>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pasien_id">Pasien</label>
                            <select name="pasien_id" class="form-control" disabled>
                                <option selected>{{ $jadwal->pasien->nama }}</option>
                            </select>
                        </div>
<div class="form-group col-md-6">
    <label for="dokter">Dokter</label>
    <input type="text" class="form-control" value="{{ $jadwal->dokter->nama ?? '-' }}" disabled>
</div>

                        <div class="form-group col-md-3">
                            <label for="tgl">Tanggal</label>
                            <input type="date" name="tgl" value="{{ $jadwal->tgl }}" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="waktu">Waktu</label>
                            <input type="time" name="waktu" value="{{ $jadwal->waktu }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
    <label for="hasil">Diagnosa</label>
    <div class="diagnosa-box">
        {{ $jadwal->diagnosa->hasil ?? '-' }}
    </div>
</div>

<style>
    .diagnosa-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background-color: #f7f7f7;
        white-space: pre-wrap; /* penting untuk baris baru */
        line-height: 1.6;
    }
</style>

                    <div class="text-center">
                        <a href="{{ url('/riwayat') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>
@endsection