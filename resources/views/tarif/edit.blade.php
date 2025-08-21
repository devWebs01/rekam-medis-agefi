@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Tarif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ route('tarif.index') }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('tarif.index') }}">Tarif</a></li>
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
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('tarif.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-12">
                                <label for="kode"><b>Nama Layanan</b></label>
                                <select name="layanan_id" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($layanan as $sws)
                                    <option value="{{ $sws->id }}">{{ $sws->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <label for="wa"><b>Nominal</b></label>
                                <input type="text" name="nominal" value="{{ $data->nominal }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection