<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Warga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #e8f5e9, #ffffff);
        }

        .navbar {
            background-color: #003b1f;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .navbar .brand { font-weight: 600; font-size: 20px; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 60px 20px;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px;
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #114b26;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }

        button {
            background-color: #007f3d;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 500;
        }

        button:hover { background-color: #00a853; }

        .back-btn {
            background: #ff3b30;
            margin-left: 10px;
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
            <a href="{{ route('warga.index') }}">Data Warga</a>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Tambah Data Warga</h2>
            <form action="{{ route('warga.store') }}" method="POST">
                @csrf

                <label for="no_ktp">Nomor KTP</label>
                <input type="text" id="no_ktp" name="no_ktp" placeholder="Masukkan No KTP" required>

                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label for="agama">Agama</label>
                <select id="agama" name="agama" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>

                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required>

                <label for="telp">No. Telepon</label>
                <input type="text" id="telp" name="telp" placeholder="Masukkan nomor telepon" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>

                <div style="text-align: center;">
                    <button type="submit">Simpan</button>
                    <a href="{{ route('warga.index') }}">
                        <button type="button" class="back-btn">Kembali</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        © 2025 Inventaris Aset Desa | Made by Kel 9 (Elin)
    </footer>
</body>
</html>
