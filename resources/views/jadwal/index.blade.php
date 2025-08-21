@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Jadwal</li>
        </ol>

        <!-- Notifikasi -->
        @if (\Session::has("notif"))
            <div class="alert alert-primary text-center" role="alert">
                {!! \Session::get("notif") !!}
            </div>
        @endif

        <!-- Error -->
        @if (session("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal menambahkan jadwal!</strong> {{ session("error") }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table me-1"></i> Data Jadwal</span>
                    @if (auth()->user()->role == "Dev")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Jadwal
                        </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (auth()->user()->role == "Dev")
                        <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Dokter</th>
                                    <th>Pasien</th>
                                    <th>Layanan</th>
                                    <th>Waktu</th>
                                    <th width="16%">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->dokter->nama ?? "-" }}</td>
                                        <td>{{ $item->pasien->nama ?? "-" }}</td>
                                        <td>{{ $item->tarif->layanan->nama ?? "-" }}</td>
                                        <td class="text-center">
                                            <span class="badge badge-primary">
                                                {{ \Carbon\Carbon::parse($item->tgl)->format("d/m/Y") }}
                                            </span>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fa fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($item->waktu)->format("H.i") }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route("jadwal.edit", $item->uuid) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route("jadwal.destroy", $item->uuid) }}" method="POST"
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
                                        <td colspan="6" class="text-center">Belum ada data jadwal</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif (auth()->user()->role == "User")
                        <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Layanan</th>
                                    <th>Waktu</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal_dokter as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->nama ?? "-" }}</td>
                                        <td>{{ $item->dokter->nama ?? "-" }}</td>
                                        <td>{{ $item->tarif->layanan->nama ?? "-" }}</td>
                                        <td class="text-center">
                                            <span class="badge badge-primary">
                                                {{ \Carbon\Carbon::parse($item->tgl)->format("d/m/Y") }}
                                            </span>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fa fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($item->waktu)->format("H.i") }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->diagnosa)
                                                <span class="badge badge-success">Sudah Didiagnosa</span>
                                                <br>
                                                <a href="{{ route("jadwal.diagnosa", $item->uuid) }}"
                                                    class="btn btn-info btn-sm mt-1">
                                                    <i class="fa fa-eye"></i> Lihat
                                                </a>
                                            @else
                                                <a href="{{ route("jadwal.tindakan", $item->uuid) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Tindakan
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data jadwal</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->role == "Dev")
        @include("jadwal._modal_create")
    @endif

@endsection
