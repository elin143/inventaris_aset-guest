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
            background: #fff9fb;
            font-family: "Belanosima", cursive;
        }



        h2 {
            color: #7b1fa2;
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
            color: #4a148c;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
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
                <tr>
                    <td>🚗 KD01</td>
                    <td>Kendaraan</td>
                    <td>Mobil, motor, dan kendaraan operasional lainnya</td>
                </tr>
                <tr>
                    <td>💻 EL02</td>
                    <td>Elektronik</td>
