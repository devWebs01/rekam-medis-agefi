@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Tarif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route("tarif.index") }}">Tarif</a></li>
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
                Form Edit Tarif
            </div>
            <div class="card-body">
                <form action="{{ route("tarif.update", $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-row">
                        <div class="col-12">
                            <label for="layanan_id"><b>Nama Layanan</b></label>
                            <select name="layanan_id" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($layanan as $sws)
                                    <option value="{{ $sws->id }}"
                                        {{ $data->layanan_id == $sws->id ? "selected" : "" }}>
                                        {{ $sws->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="nominal"><b>Nominal</b></label>
                            <input type="number" name="nominal" value="{{ $data->nominal }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route("tarif.index") }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
