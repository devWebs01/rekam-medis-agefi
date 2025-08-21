@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Filter Laporan</li>
    </ol>

    <!-- Notifikasi -->
    @if (\Session::has('notif'))
        <div class="alert alert-primary" role="alert">
            {!! \Session::get('notif') !!}
        </div>
    @endif

    <!-- Error -->
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
            <i class="fas fa-filter me-1"></i>
            Filter Berdasarkan Tanggal
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.harian') }}" target="_blank" method="GET">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal_awal" value="{{ request('tanggal_awal') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Lihat Laporan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
