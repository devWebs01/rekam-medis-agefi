<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (auth()->user()->role == 'Dev')
                <div class="sb-sidenav-menu-heading">Halaman Admin</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Beranda
                </a>
                <a class="nav-link" href="{{ route('jadwal.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                    Jadwal
                </a>
                <a class="nav-link" href="{{ route('riwayat.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Riwayat
                </a>
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                    Laporan
                </a>
                <div class="sb-sidenav-menu-heading">Data Master</div>
                <a class="nav-link" href="{{ route('pasien.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Pasien
                </a>
                <a class="nav-link" href="{{ route('dokter.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Dokter
                </a>
                <a class="nav-link" href="{{ route('tarif.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                    Tarif
                </a>
                <a class="nav-link" href="{{ route('layanan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Layanan
                </a>
                <div class="sb-sidenav-menu-heading">Data Akun</div>
                <a class="nav-link" href="{{ route('user.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    User
                </a>
                @elseif (auth()->user()->role == 'User')
                <div class="sb-sidenav-menu-heading">Halaman Dokter</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Beranda
                </a>
                <div class="sb-sidenav-menu-heading">Data Master</div>
                <a class="nav-link" href="{{ route('jadwal.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                    Jadwal
                </a>
                <a class="nav-link" href="{{ route('riwayat.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Riwayat
                </a>
                @endif
                <div class="sb-sidenav-menu-heading" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Keluar Aplikasi</div>
            </div>
        </div>
    </nav>
</div>