@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Riwayat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Riwayat Diagnosa</li>
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
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Riwayat
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
                                    <th width="6%">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->dokter->nama ?? "-" }}</td>
                                        <td>{{ $item->pasien->nama ?? "-" }}</td>
                                        <td>{{ $item->tarif->layanan->nama ?? "-" }} || Rp
                                            {{ number_format($item->tarif->nominal, 0, ",", ".") }}</td>
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
                                            <a href="{{ route("jadwal.diagnosa", $item->uuid) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data riwayat</td>
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
                                    <th width="6%">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
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
                                            <a href="{{ route("jadwal.diagnosa", $item->uuid) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data riwayat</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
