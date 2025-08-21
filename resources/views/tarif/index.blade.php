@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tarif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Tarif</li>
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
                    <span><i class="fas fa-table me-1"></i> Data Tarif</span>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Tarif
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Layanan</th>
                                <th>Nominal</th>
                                <th width="16%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item->layanan->nama }}</td>
                                    <td class="text-right">Rp {{ number_format($item->nominal, 0, ",", ".") }}</td>
                                    <td class="text-center">
                                        <a href="{{ route("tarif.edit", $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route("tarif.destroy", $item->id) }}" method="POST"
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
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data tarif</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include("tarif._modal_create")

@endsection
