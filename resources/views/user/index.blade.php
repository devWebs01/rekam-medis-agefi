@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar User</li>
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
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table me-1"></i> Data User</span>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i> Tambah User
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th width="6%">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td class="text-center"><b>{{ $loop->iteration }}.</b></td>
                                    <td>{{ $item->dokter->nama ?? "" }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td width="15%" class="text-center">
                                        <form action="{{ route("user.destroy", $item->id) }}" method="POST"
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
                                    <td colspan="4" class="text-center">Belum Ada Data !!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include("user._modal_create")

@endsection
