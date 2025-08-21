@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tindakan</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <a href="{{ route('jadwal.index') }}">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
        </ol>

        @if (session('notif'))
        <div class="alert alert-primary text-center">
            {!! session('notif') !!}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('jadwal.tindakan_up') }}" method="POST">
                    @csrf

                    {{-- Hidden input agar jadwal_id tetap terkirim --}}
                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pasien_id">Pasien</label>
                            <select name="pasien_id" class="form-control" disabled>
                                <option selected>{{ $jadwal->pasien->nama }}</option>
                            </select>
                        </div>
                        

                        <div class="form-group col-md-3">
                            <label for="tgl">Tanggal</label>
                            <input type="date" name="tgl" value="{{ $jadwal->tgl }}" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="waktu">Waktu</label>
                            <input type="time" name="waktu" value="{{ $jadwal->waktu }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                     <label for="hasil">Diagnosa</label>
                        <textarea name="hasil" class="form-control" rows="4" placeholder="Hasil diagnosa" required>{{ old('hasil') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
            <script>
               document.addEventListener("DOMContentLoaded", function () {
                  const textarea = document.querySelector('textarea[name="hasil"]');
                  if (textarea) {
                  textarea.style.height = 'auto';
                     textarea.style.overflowY = 'hidden';
                     textarea.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        }
    });
</script>

        </div>
    </div>
</main>
@endsection