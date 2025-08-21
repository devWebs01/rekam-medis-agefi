    @extends('layouts.backend')

    @section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Jadwal</h1>
            @if (auth()->user()->role == 'Dev')
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#exampleModal">Tambah Jadwal</a></li>
                <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
            </ol>
            @endif
            <!-- notif -->
            @if (\Session::has('notif'))
            <div class="alert alert-primary text-center">
                {!! \Session::get('notif') !!}
            </div>
            @endif
            <!-- notif -->
            <!-- error -->
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal menambahkan jadwal!</strong> {{ session('error') }}
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
                                    <th width="16%">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->dokter->nama ?? '-' }}</td>
                                    <td>{{ $item->pasien->nama ?? '-' }}</td>
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

                                    <td nowrap>
                                        <a href="/jadwal/edit/{{ $item->uuid }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="/jadwal/delete/{{ $item->uuid }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus ?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Hapus
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
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal_dokter as $item)
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

                                    <td class="text-center">
                                        @if ($item->diagnosa)
                                        <span class="badge badge-success">Sudah Didiagnosa</span>
                                        <br>
                                        <a href="/jadwal/diagnosa/{{ $item->uuid }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i> Lihat
                                        </a>
                                        @else
                                        <a href="/jadwal/tindakan/{{ $item->uuid }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Tindakan
                                        </a>
                                        @endif
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

    <!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/jadwal/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="dokter_id">Dokter</label>
                            <select name="dokter_id" class="form-control">
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($dokter as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pasien_id">Pasien</label>
                            <select name="pasien_id" class="form-control">
                                <option value="">-- Pilih Pasien --</option>
                                @foreach ($pasien as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tarif_id">Layanan</label>
                            <select name="tarif_id" class="form-control">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($tarif as $t)
                                <option value="{{ $t->id }}">{{ $t->layanan->nama }} || Rp{{ number_format($t->nominal, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tgl">Tanggal</label>
                                <input type="date" name="tgl" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="waktu">Waktu</label>
                                <input type="time" name="waktu" class="form-control">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection