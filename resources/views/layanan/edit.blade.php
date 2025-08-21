@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Layanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ route('layanan.index') }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('layanan.index') }}">Layanan</a></li>
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
                <form action="{{ route('layanan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12">
                            <label for="kode"><b>Kode Layanan</b></label>
                            <input type="text" name="kode" value="{{ $data->kode }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="wa"><b>Nama Layanan</b></label>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</main>
@endsection