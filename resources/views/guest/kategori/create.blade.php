<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #fce4ec);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-card {
            width: 100%;
            max-width: 480px;
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
        }

        .form-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .form-card h2 {
            font-weight: 700;
            color: #1e88e5;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            text-align: left;
            display: block;
        }

        .form-control {
            border-radius: 10px;
            border: 1.5px solid #ced4da;
            padding: 10px 12px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #2196f3;
            box-shadow: 0 0 8px rgba(33, 150, 243, 0.2);
        }

        textarea.form-control {
            resize: none;
            min-height: 100px;
        }

        .btn {
            width: 100%;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            background: linear-gradient(90deg, #2196f3, #21cbf3);
            border: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(90deg, #1e88e5, #00bcd4);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }
    </style>
</head>

<body>
    <div class="form-card">
        <h2>Tambah Kategori</h2>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" name="kode" id="kode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>

</html>
