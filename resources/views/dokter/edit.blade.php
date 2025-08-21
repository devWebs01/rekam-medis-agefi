@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Dokter</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ route('dokter.index') }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}">Dokter</a></li>
        </ol>
        <!-- notif -->
        @if (\Session::has('notif'))
        <div class="alert alert-primary" align="center">
            {!! \Session::get('notif') !!}
        </div>
        @endif
        <!-- notif -->
        <!-- error -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- end error -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dokter.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="wa"><b>No WA</b></label>
                            <input type="number" name="wa" value="{{ $data->wa }}" class="form-control" placeholder="Contoh: 6281234567890" pattern="62[0-9]{9,}" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required>{{ $data->alamat }}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection