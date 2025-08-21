@extends("layouts.backend")

@section("content")
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Layanan</h1>
            <div class="d-flex justify-content-end mb-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> Tambah Layanan
                </button>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Layanan</li>
            </ol>
            <!-- notif -->
            @if (\Session::has("notif"))
                <div class="alert alert-primary" align="center">
                    {!! \Session::get("notif") !!}
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
                    <div class="table-wrapper">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Kode Layanan</th>
                                        <th>Nama Layanan</th>
                                        <th width="16%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td nowrap>
                                                <a href="{{ route("layanan.edit", $item->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route("layanan.destroy", $item->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin ingin menghapus ?')">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route("layanan.store") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-12">
                                <label for="nama"><b>Kode Layanan</b></label>
                                <input type="text" name="kode" class="form-control"
                                    placeholder="Masukkan Kode Layanan" required>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <label for="wa"><b>Nama Layanan</b></label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukkan Nama Layanan" required>
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
