<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventaris Aset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===== FONT & ICON ===== -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/themify-icons.css') }}" rel="stylesheet">

    <style>
        /* ========== GLOBAL STYLE ========== */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f9fafb;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background: #1e1e2d;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
            z-index: 100;
        }

        .sidebar .logo {
            text-align: center;
            padding: 25px 0 10px;
            border-bottom: 1px solid #2f2f40;
        }

        .sidebar .logo img {
            max-width: 120px;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 20px 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 8px;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #bdbdc7;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .sidebar nav ul li a:hover {
            background: #35354a;
            color: #fff;
            transform: translateX(4px);
        }

        .sidebar nav ul li a i {
            font-size: 18px;
        }

        .sidebar .auth {
            padding: 20px;
            border-top: 1px solid #2f2f40;
        }

        .sidebar .auth a {
            display: block;
            text-align: center;
            background: linear-gradient(135deg, #5865f2, #4e54c8);
            color: #fff;
            padding: 10px 0;
            border-radius: 8px;
            margin-bottom: 10px;
            font-weight: 500;
            transition: 0.3s;
        }

        .sidebar .auth a:hover {
            background: linear-gradient(135deg, #4e54c8, #5865f2);
            transform: scale(1.03);
        }

        /* ========== MAIN CONTENT ========== */
        .main {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: #fff;
            padding: 15px 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            color: #1e1e2d;
        }

        header .user {
            font-weight: 500;
            color: #5865f2;
        }

        .content {
            flex: 1;
            padding: 50px 40px;
            background: #f9fafb;
        }

        .hero {
            background: #ffffff;
            border-radius: 16px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .hero h2 {
            font-size: 28px;
            font-weight: 600;
            color: #1e1e2d;
        }

        .hero p {
            color: #555;
            margin-top: 10px;
            font-size: 16px;
        }

        /* tempat untuk gambar */
        .hero .image-placeholder {
            width: 100%;
            height: 250px;
            background: #e8e8ef;
            border-radius: 12px;
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #777;
            font-size: 14px;
        }

        footer {
            background: #fff;
            padding: 20px 40px;
            text-align: center;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
        }

        .image-placeholder {
            width: 100%;
            max-height: 500px;
            /* bisa kamu ubah misalnya 400-600px */
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .image-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ini yang bikin gambar proporsional dan keren */
            transition: transform 0.5s ease;
            border-radius: 16px;
        }

        .image-placeholder img:hover {
            transform: scale(1.03);
            /* efek zoom lembut saat hover */
        }
    </style>
</head>

<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <div>
            <nav>
                <ul>
                    <li><a href="#"><i class="ti-info-alt"></i> About</a></li>
                    <li><a href="{{ route('kategori.index') }}"><i class="ti-menu-alt"></i> Categories</a></li>
                    <li><a href="#"><i class="ti-view-list"></i> Listing</a></li>
                    <li><a href="#"><i class="ti-email"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="auth">
            <a href="#">Sign In</a>
            <a href="#">Register</a>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main">
        <header>
            <h1>Inventaris Aset</h1>
            <div class="user">Welcome, Guest</div>
        </header>

        <div class="content">
            <div class="hero">
                <h2>Selamat Datang di Sistem Inventaris Aset</h2>
                <p>Kelola dan pantau aset Anda dengan mudah dan efisien.</p>


                <div class="image-placeholder">
                    <img src="{{ asset('/assets-guest/img/hero/hero3.jpg') }}" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>

    <footer>
        ©
        <script>
            document.write(new Date().getFullYear());
        </script> Inventaris Aset . Kelompok 9
    </footer>
    </div>

</body>

</html>
