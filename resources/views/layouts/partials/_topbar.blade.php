<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="">AGEFI</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li>
            <a class="text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth
                {{ Auth::user()->name }}
                @endauth
            </a>
        </li>
    </ul>
</nav>