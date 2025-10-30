<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-card {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="form-card">
    <h3 class="text-center mb-4">Edit Kategori Inventaris</h3>
    <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control"
                   value="{{ $kategori->nama }}" required>

                        <label for="kode" class="form-label">Kode Kategori</label>
            <input type="text" name="kode" id="kode" class="form-control"
                   value="{{ $kategori->kode }}" required>

                        <label for="deskripsi" class="form-label">Deskripsi Kategori</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                   value="{{ $kategori->deskripsi }}" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
</body>
</html>
