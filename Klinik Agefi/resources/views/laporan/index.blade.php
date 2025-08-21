@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Laporan</h1>

        <!-- Notifikasi -->
        @if (\Session::has('notif'))
        <div class="alert alert-primary" align="center">
            {!! \Session::get('notif') !!}
        </div>
        @endif

        <!-- Error -->
        @if (count($errors) > 0)
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
                <form action="{{ route('laporan.harian') }}" target="_blank" method="GET">
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-4">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal"
                                value="{{ request('tanggal_awal') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir"
                                value="{{ request('tanggal_akhir') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</main>
@endsection