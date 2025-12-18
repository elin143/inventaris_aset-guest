    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <img class="img-fluid" src="{{ asset('assets-guest/img/icon.png') }}" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto small">
                        <a href="{{ route('dashboard') }}"
                            class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('tentang') }}"
                            class="nav-item nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">About</a>
                        <a href="{{ route('warga.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('warga.index') ? 'active' : '' }}">Warga</a>
                        <a href="{{ route('kategori.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}">Kategori</a>
                        <a href="{{ route('aset.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('aset.index') ? 'active' : '' }}">Aset</a>
                        <a href="{{ route('mutasi-aset.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('mutasi-aset.index') ? 'active' : '' }}">Mutasi
                            Aset</a>
                        <a href="{{ route('lokasi.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('lokasi.index') ? 'active' : '' }}">Lokasi
                        </a>
                        <a href="{{ route('pemeliharaan.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('pemeliharaan.index') ? 'active' : '' }}">Pemeliharaan
                            Aset </a>
                        <a href="{{ route('developer') }}"
                            class="nav-item nav-link {{ request()->routeIs('developer') ? 'active' : '' }}">Identitas Pengembang
                        </a>
                        <ul class="navbar-nav d-flex align-items-center">

            @if(Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 small"
                   href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span>Halo, {{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end rounded-2 m-0">
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger w-100 text-start px-3">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>

            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 small"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-5"></i> Akun
                </a>

                <div class="dropdown-menu dropdown-menu-end rounded-2 m-0">
                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                    <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                </div>
            </li>
            @endif

        </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
