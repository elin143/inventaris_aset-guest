<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #e8f5e9, #ffffff);
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #003b1f;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .navbar .brand {
            font-weight: 600;
            font-size: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-tambah {
            background: linear-gradient(135deg, #005f2f, #007f3d);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
        }

        .btn-tambah:hover {
            background: #00a853;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            border-left: 6px solid #004d25;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h3 {
            margin: 5px 0;
            color: #004d25;
        }

        .card p {
            color: #333;
            font-size: 14px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .btn-edit,
        .btn-hapus {
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-edit {
            background-color: #ffc107;
            color: black;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: white;
        }

        .btn-edit:hover {
            background-color: #ffca2c;
        }

        .btn-hapus:hover {
            background-color: #ff5252;
        }

        footer {
            margin-top: 60px;
            background: #003b1f;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">Inventaris Desa</div>
        <div>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('warga.index') }}">User</a>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h2>Daftar User</h2>
            <a href="{{ route('warga.create') }}" class="btn-tambah">+ Tambah Warga</a>
        </div>

        {{-- ✅ ALERT BERHASIL --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cards">
            @foreach ($warga as $warga)
                <div class="card">
                    <div>
                        <h3>{{ $warga->name }}</h3>
                        <p>Nama: {{ $warga->email }}</p>
                        <p><strong>No. KTP:</strong> {{ $warga->no_ktp }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
                        <p><strong>Agama:</strong> {{ $warga->agama }}</p>
                        <p><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
                        <p><strong>No. Telepon:</strong>
                        <p>Email: {{ $warga->email }}</p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('warga.edit', $warga->warga_id) }}">
                            <button class="btn-edit">Edit</button>
                        </a>
                        <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        © 2025 Inventaris Aset Desa | Made by Kel 9 (Elin)
    </footer>

</body>

</html>
