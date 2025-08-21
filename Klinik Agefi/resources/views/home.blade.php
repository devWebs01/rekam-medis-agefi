@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-1 text-black fw-bold">
            Dashboard
        </h1>

        @if (session('notif'))
        <div class="alert alert-primary text-center">
            {!! session('notif') !!}
        </div>
        @endif

        @if (auth()->user()->role == 'Dev')
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    @php
                    $cards = [
                    ['title' => 'Pasien', 'count' => $pasien, 'icon' => 'fas fa-user'],
                    ['title' => 'Dokter', 'count' => $dokter, 'icon' => 'fas fa-user-graduate'],
                    ['title' => 'Jadwal', 'count' => $jadwal, 'icon' => 'fas fa-calendar'],
                    ['title' => 'User', 'count' => $user, 'icon' => 'fas fa-users']
                    ];
                    @endphp

                    @foreach ($cards as $card)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                {{ $card['title'] }}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $card['count'] }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="{{ $card['icon'] }} fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if (auth()->user()->role == 'User')
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    @php
                    $cards = [
                    ['title' => 'Jadwal', 'count' => $jadwal_dokter, 'icon' => 'fas fa-calendar'],
                    ];
                    @endphp

                    @foreach ($cards as $card)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                {{ $card['title'] }}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $card['count'] }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="{{ $card['icon'] }} fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
</main>
@endsection