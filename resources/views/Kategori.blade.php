<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Aset</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Belanosima", cursive;
            background: linear-gradient(270deg, #f8cdda, #1d2b64);
            background-size: 400% 400%;
            animation: gradientMove 8s ease infinite;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
                header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(6px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 30px;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .login-btn {
            background-color: #fff;
            color: #1d2b64;
            border: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color: #f8cdda;
            color: #1d2b64;
            box-shadow: 0 0 10px rgba(255,255,255,0.4);
        }
        h2 {
            color: #000000;
            font-weight: bold;
            margin-bottom: 25px;
            text-shadow: 1px 1px #f3e5f5;
        }
        .table {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        thead {
            background: linear-gradient(90deg, #ce93d8, #ba68c8);
            color: #fff;
        }
        thead th {
            text-align: center;
            font-size: 1.05rem;
        }
        tbody tr:nth-child(odd) {
            background-color: #fce4ec;
        }
        tbody tr:nth-child(even) {
            background-color: #f3e5f5;
        }
        tbody td {
            vertical-align: middle;
            font-size: 0.95rem;
        }
        .emoji {
            font-size: 1.2rem;
        }
        .card-box {
            background: #f8bbd0;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            color: #000000;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Inventaris Aset Desa</h1>
        <a href="{{ route('auth.login') }}">
            <button class="login-btn">Login</button>
        </a>
    </header>
    <div class="container py-5">
        <h2 class="text-center"> Daftar Kategori Aset </h2>

        <div class="card-box">
             Data kategori aset di bawah ini akan membantumu mengelompokkan inventaris dengan lebih rapi
        </div>

        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
    @foreach($kategori as $item)
        <tr>
            <td>{{ $item['kode'] }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['deskripsi'] }}</td>
        </tr>
    @endforeach
</tbody>

