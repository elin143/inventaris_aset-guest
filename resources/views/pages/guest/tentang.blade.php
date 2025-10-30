<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - Sistem Inventaris Aset Desa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('{{ asset('assets-guest/img/hero/h1_hero.jpg') }}') center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
            border-radius: 12px;
            margin-bottom: 40px;
        }

        .section-title {
            color: #0d6efd;
            font-weight: 600;
        }

        .module-card {
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        img.module-img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- 🔹 NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Inventaris Aset Desa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- Ganti /dashboard dengan route dashboard kamu -->
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 KONTEN UTAMA -->
    <div class="container mt-4 mb-5">

        <!-- Hero Section -->
        <div class="hero">
            <h1 class="display-5 fw-bold">Sistem Inventaris Aset Desa</h1>
            <p class="lead">Membantu Pemerintah Desa Mengelola Aset Secara Efektif, Akurat, dan Transparan</p>
        </div>

        <!-- Deskripsi Umum -->
        <section class="mb-5">
            <h3 class="section-title mb-3">Tujuan Utama Modul</h3>
            <p>
                Modul Inventaris Aset Desa dibuat untuk membantu aparat desa dalam mencatat,
                mengelola, dan memantau seluruh aset milik desa secara digital.
                Dengan adanya sistem ini, data aset menjadi lebih terstruktur,
                mudah diakses, dan dapat dipertanggungjawabkan secara transparan.
            </p>
        </section>

        <!-- Alur Sistem -->
        <section class="mb-5">
            <h3 class="section-title mb-3">Alur Kerja Sistem</h3>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ol>
                        <li><strong>Pencatatan Aset:</strong> Operator desa menambahkan data aset baru ke dalam sistem
                            (nama aset, lokasi, nilai, tahun perolehan, dan kondisi).</li>
                        <li><strong>Verifikasi Data:</strong> Data aset diverifikasi oleh admin atau kepala desa agar
                            valid.</li>
                        <li><strong>Pemutakhiran:</strong> Jika terjadi perubahan kondisi, pemindahan, atau penghapusan,
                            data diperbarui agar tetap akurat.</li>
                        <li><strong>Laporan:</strong> Sistem secara otomatis menghasilkan laporan aset desa untuk
                            keperluan administrasi dan audit.</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets-guest/img/modul/alur-inventaris.png') }}"
                        alt="Alur Sistem Inventaris Desa" class="module-img">
                </div>
            </div>
        </section>

        <!-- Modul Fitur -->
        <section class="mb-5">
            <h3 class="section-title mb-3">Modul dan Fungsinya</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card module-card p-3 h-100">
                        <img src="{{ asset('assets-guest/img/modul/modul1.png') }}" class="module-img mb-3"
                            alt="Data Aset">
                        <h5>1. Modul Data Aset</h5>
                        <p>Berfungsi untuk menambah, mengedit, dan menghapus data aset desa. Setiap aset memiliki
                            informasi detail seperti kode aset, lokasi, tahun perolehan, dan nilai buku.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card module-card p-3 h-100">
                        <img src="{{ asset('assets-guest/img/modul/modul2.png') }}" class="module-img mb-3"
                            alt="Laporan Aset">
                        <h5>2. Modul Laporan</h5>
                        <p>Menyediakan tampilan laporan aset dalam bentuk tabel atau grafik, sehingga memudahkan
                            perangkat desa dalam menyusun laporan tahunan dan audit.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card module-card p-3 h-100">
                        <img src="{{ asset('assets-guest/img/modul/modul3.png') }}" class="module-img mb-3"
                            alt="User Management">
                        <h5>3. Modul Manajemen Pengguna</h5>
                        <p>Mengatur hak akses pengguna berdasarkan peran, seperti operator, admin, dan kepala desa,
                            untuk menjaga keamanan dan integritas data.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kesimpulan -->
        <section class="text-center mt-5">
            <h4 class="fw-bold text-success">Manfaat Sistem</h4>
            <p>
                Dengan penerapan sistem ini, pengelolaan aset desa menjadi lebih tertib, transparan,
                dan efisien, mendukung tata kelola pemerintahan desa yang baik dan akuntabel.
            </p>
        </section>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</body>

</html>
