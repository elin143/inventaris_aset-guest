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
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('tentang') }}" class="nav-item nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">About</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Warga</a>
                        <a href="{{ route('kategori.index') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">kategori</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>

                                <!-- Tombol logout tetap tampil meskipun sudah login -->
                                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-danger w-100 text-start px-3">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>


                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
