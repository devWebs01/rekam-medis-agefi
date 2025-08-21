@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Riwayat</h1>
        <!-- notif -->
        @if (\Session::has('notif'))
        <div class="alert alert-primary text-center">
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
                @if (auth()->user()->role == 'Dev')
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->dokter->nama ?? '-' }}</td>
                                <td>{{ $item->pasien->nama ?? '-' }}</td>
                                <td>{{ $item->tarif->layanan->nama ?? '-' }} || Rp {{ number_format($item->tarif->nominal, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-primary">
                                        {{ \Carbon\Carbon::parse($item->tgl)->format('d/m/Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($item->waktu)->format('H.i') }}
                                    </small>
                                </td>
                                <td>
                                    <a href="/jadwal/diagnosa/{{ $item->uuid }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data jadwal</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                @endif
                @if (auth()->user()->role == 'User')
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pasien->nama ?? '-' }}</td>
                                <td>{{ $item->dokter->nama ?? '-' }}</td>
                                <td>{{ $item->tarif->layanan->nama ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-primary">
                                        {{ \Carbon\Carbon::parse($item->tgl)->format('d/m/Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($item->waktu)->format('H.i') }}
                                    </small>
                                </td>
                                <td>
                                    <a href="/jadwal/diagnosa/{{ $item->uuid }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data jadwal</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                @endif
            </div>
        </div>
    </div>
</main>



@endsection