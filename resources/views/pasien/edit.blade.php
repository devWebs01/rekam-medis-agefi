@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route("pasien.index") }}">Pasien</a></li>
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
                Form Edit Pasien
            </div>
            <div class="card-body">
                <form action="{{ route("pasien.update", $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-row">
                        <div class="col-12">
                            <label for="name"><b>Nama</b></label>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label><b>Jenis Kelamin</b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l"
                                    value="Laki-laki" {{ $data->jk == "Laki-laki" ? "checked" : "" }} required>
                                <label class="form-check-label" for="jk_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p"
                                    value="Perempuan" {{ $data->jk == "Perempuan" ? "checked" : "" }}>
                                <label class="form-check-label" for="jk_p">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="wa"><b>No WA</b></label>
                            <input type="tel" name="wa" value="{{ $data->wa }}" class="form-control"
                                placeholder="Contoh: 6281234567890" pattern="62[0-9]{9,}" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required>{{ $data->alamat }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route("pasien.index") }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
