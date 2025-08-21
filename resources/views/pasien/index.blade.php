@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Pasien</li>
        </ol>

        <!-- Notifikasi -->
        @if (\Session::has("notif"))
            <div class="alert alert-primary" role="alert">
                {!! \Session::get("notif") !!}
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
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table me-1"></i> Data Pasien</span>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Pasien
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-center text-nowrap" id="dataTable" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No. WA</th>
                                <th>Alamat</th>
                                <th width="16%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>
                                        <a href="https://wa.me/{{ $item->wa }}" target="_blank">
                                            {{ $item->wa }}
                                        </a>
                                    </td>
                                    <td>{{ $item->alamat }}</td>
                                    <td nowrap>
                                        <a href="{{ route("pasien.edit", $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route("pasien.destroy", $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include("pasien._modal_create")

@endsection
