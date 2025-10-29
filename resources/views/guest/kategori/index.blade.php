<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ====== Gaya Dasar ====== */
        body {
            background: linear-gradient(135deg, #e9fdf3 0%, #f9fafb 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
        }

        /* ====== SIDEBAR ====== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            background: #042a02;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 25px 0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            color: #bdbdc7;
            text-decoration: none;
            display: block;
            padding: 12px 25px;
            font-weight: 500;
            border-radius: 8px;
            transition: 0.3s;

        }

        .sidebar nav ul li a:hover {
            background: #35354a;
            color: #fff;
            transform: translateX(4px);
        }

        .sidebar .auth {
            padding: 20px;
            border-top: 1px solid #2f2f40;
        }

        .sidebar .auth a {
            display: block;
            text-align: center;
            background: linear-gradient(135deg, #0b3110, #4f878a);
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

        /* ====== MAIN CONTENT ====== */
        .main-content {
            margin-left: 230px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .container {
            margin-top: 60px;
            flex: 1;
        }

        /* ====== Card Utama ====== */
        .card {
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: none;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #073905, #4ade80);
        }

        /* ====== Judul ====== */
        h3 {
            font-weight: 700;
            color: #14532d;
            letter-spacing: 0.5px;
        }

        /* ====== Tombol Tambah ====== */
        .btn-success {
            background: linear-gradient(90deg, #073905, #72c08d);
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #042a02, #4f715b);
            transform: translateY(-2px);
        }

        /* ====== Grid Layout untuk Card ====== */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 10px;
        }

        /* ====== Card Kategori ====== */
        .category-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 20px;
            transition: all 0.3s ease;
            border-left: 5px solid #466c44;
            animation: fadeIn 0.6s ease-in-out;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        /* ====== Teks dalam Card ====== */
        .category-card h5 {
            font-size: 17px;
            font-weight: 600;
            color: #042a02;
            margin-bottom: 8px;
        }

        .category-card .code {
            font-size: 13px;
            font-weight: 500;
            color: #042a02;
            margin-bottom: 6px;
        }

        .category-card p {
            font-size: 13px;
            color: #042a02;
            min-height: 40px;
        }

        /* ====== Tombol Aksi ====== */
        .category-card .actions {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-card .btn {
            border-radius: 8px;
            font-size: 13px;
            padding: 6px 12px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        /* ====== Warna Tombol ====== */
        .btn-warning {
            background: #fdcb00;
            color: #000000;
            border: none;
            box-shadow: 0 3px 6px rgba(250, 204, 21, 0.3);
        }

        .btn-warning:hover {
            background: #fde68a;
            transform: scale(1.05);
        }

        .btn-danger {
            background: #cb1717;
            color: white;
            border: none;
            box-shadow: 0 3px 6px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: scale(1.05);
        }

        /* ====== Footer ====== */
        footer {
            background: #042a02;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            letter-spacing: 0.3px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.08);
        }

        footer span {
            font-weight: 600;
            color: #bbf7d0;
        }

        /* ====== Animasi ====== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- ===== SIDEBAR TAMBAHAN ===== -->
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}"><i class="ti-info-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('kategori.index') }}">Categories</a></li>
                <li><a href="#">Listing</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="auth">
            <a href="#">Sign In</a>
            <a href="#">Register</a>
        </div>
    </div>

    <!-- ===== KONTEN UTAMA ===== -->
    <div class="main-content">
        <div class="container">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Daftar Kategori Inventaris</h3>

                <div class="text-end mb-3">
                    <a href="{{ route('kategori.create') }}" class="btn btn-success">+ Tambah Kategori</a>
                </div>

                {{-- Notifikasi sukses --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Tampilan baru: card grid --}}
                <div class="card-container">
                    @forelse ($kategori as $index => $item)
                        <div class="category-card">
                            <div class="code">#{{ $item->kode }}</div>
                            <h5>{{ $item->nama }}</h5>
                            <p>{{ $item->deskripsi }}</p>

                            <div class="actions">
                                <a href="{{ route('kategori.edit', $item->kategori_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">Belum ada data kategori</p>
                    @endforelse
                </div>
            </div>
        </div>

        <footer>
            <p>© 2025 Inventaris Aset Desa | Made by <span>Kel 9 (elin)</span></p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
