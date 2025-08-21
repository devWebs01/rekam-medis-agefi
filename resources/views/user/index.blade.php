@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#exampleModal">
                    Tambah User</a>
            </li>
            <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal"> <i
                        class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ol>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th class="text-center">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count() == 0)
                            <tr align="center">
                                <th colspan="4">Belum Ada Data !!!</th>
                            </tr>
                            @else
                            @foreach ($data as $item)
                            <tr>
                                <td><b>{{ $loop->iteration }}.</b></td>
                                <td>{{ $item->dokter->nama ??''}}</td>
                                <td>{{ $item->username }}</td>
                                <td width="15%" align="center">
                                    <a href="/user/delete/{{ $item->id }}/" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus ?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/user/store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12 col-sm-12">
                            <label class="small mb-1" for="guru_id">Nama Dokter</label>
                            <select name="dokter_id" class="form-control" required="">
                                <option value="" selected disabled>-- Pilih -- </option>
                                @foreach ($dokter as $gr)
                                <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3 mb-3">
                        <div class="col-6 col-sm-6">
                            <label class="small mb-1" for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username Login">
                        </div>
                        <div class="col-6 col-sm-6">
                            <label class="small mb-1" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mb-0">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- stop modal --}}
@endsection