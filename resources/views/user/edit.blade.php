@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Profil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route("user.index") }}">User</a></li>
            <li class="breadcrumb-item active">Edit Profil</li>
        </ol>

        <!-- Notifikasi -->
        @if (\Session::has("notif"))
            <div class="alert alert-primary text-center" role="alert">
                {!! \Session::get("notif") !!}
            </div>
        @endif

        <!-- Error -->
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
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit Profil
            </div>
            <div class="card-body">
                <form action="{{ route("user.update", $profil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $profil->name ?? "" }}" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Username Login</label>
                            <input type="text" class="form-control" value="{{ $profil->username }}" disabled>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengganti">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 mb-0">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route("user.index") }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
