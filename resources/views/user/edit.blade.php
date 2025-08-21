@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Profil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Profil</li>
        </ol>

        <!-- notif -->
        @if (\Session::has('notif'))
        <div class="alert alert-primary text-center">
            {!! \Session::get('notif') !!}
        </div>
        @endif

        <!-- error -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- form -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('user.update', $profil->id) }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate="">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $profil->name ?? '' }}" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Username Login</label>
                            <input type="text" class="form-control" value="{{ $profil->username }}" disabled>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection