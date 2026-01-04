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

                    {{-- HOME --}}
                    <a href="{{ route('dashboard') }}"
                        class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Home
                    </a>

                    {{-- ABOUT --}}
                    <a href="{{ route('tentang') }}"
                        class="nav-item nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                        About
                    </a>

                    {{-- WARGA (BIARKAN SEPERTI PUNYAMU) --}}
                    <a href="{{ route('warga.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                        Warga
                    </a>

                    {{-- KATEGORI --}}
                    <a href="{{ route('kategori.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                        Kategori
                    </a>

                    {{-- ASET --}}
                    <a href="{{ route('aset.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('aset.*') ? 'active' : '' }}">
                        Aset
                    </a>

                    {{-- MUTASI --}}
                    <a href="{{ route('mutasi-aset.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('mutasi-aset.*') ? 'active' : '' }}">
                        Mutasi Aset
                    </a>

                    {{-- LOKASI --}}
                    <a href="{{ route('lokasi.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('lokasi.*') ? 'active' : '' }}">
                        Lokasi
                    </a>

                    {{-- PEMELIHARAAN --}}
                    <a href="{{ route('pemeliharaan.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('pemeliharaan.*') ? 'active' : '' }}">
                        Pemeliharaan Aset
                    </a>

                    {{-- DEVELOPER --}}
                    <a href="{{ route('developer') }}"
                        class="nav-item nav-link {{ request()->routeIs('developer') ? 'active' : '' }}">
                        Identitas Pengembang
                    </a>
                </div>

                {{-- AUTH DROPDOWN --}}
            <li class="nav-item dropdown">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 small" href="#"
                                data-bs-toggle="dropdown">
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
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
