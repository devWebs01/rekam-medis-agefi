@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dokter</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#exampleModal">
                    Tambah Dokter</a>
            </li>
            <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal"> <i
                        class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ol>
        <!-- notif -->
        @if (\Session::has('notif'))
        <div class="alert alert-primary" align="center">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>WA</th>
                                <th>Alamat</th>
                                <th width="16%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->nama   }}</td>
                                <td>
                                    <a href="https://wa.me/{{ $item->wa }}" target="_blank">{{ $item->hal }}
                                        {{ $item->wa }}
                                    </a>
                                </td>
                                <td>{{ $item->alamat }}</td>
                                <td nowrap>
                                    <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dokter.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus ?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Hapus
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
</main>
<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="wa"><b>No WA</b></label>
                            <input type="number" name="wa" class="form-control" placeholder="Contoh: 6281234567890" pattern="62[0-9]{9,}" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
{{-- stop modal --}}
@endsection