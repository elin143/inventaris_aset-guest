    <div class="sidebar">
        <div>
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}"><i class="ti-info-alt"></i> Dashboard</a></li>
                    <li><a href="{{ route('kategori.index') }}"><i class="ti-menu-alt"></i> Categories</a></li>
                    <li><a href="{{ route('warga.index') }}"><i class="ti-view-list"></i> Warga</a></li>
                    <li><a href="#"><i class="ti-email"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="auth">
            <a href="{{ route('login') }}">Log In</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>


