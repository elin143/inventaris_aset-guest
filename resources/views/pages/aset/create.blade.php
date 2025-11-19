<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')
@section('content')
<body>
    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <!-- Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Tambah Aset</h1>
        </div>
    </div>

<!-- Form Tambah Aset -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                        <h4 class="mb-0">Form Tambah Data Aset</h4>
                    </div>

                    <div class="card-body p-5 bg-light">
                        <form action="{{ route('aset.store') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kode Aset</label>
                                    <input type="text" name="kode_aset" class="form-control"
                                           placeholder="Masukkan Kode Aset" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Aset</label>
                                    <input type="text" name="nama_aset" class="form-control"
                                           placeholder="Masukkan Nama Aset" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Kategori Aset</label>
                                    <select name="kategori_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Tanggal Perolehan</label>
                                    <input type="date" name="tgl_perolehan" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nilai Perolehan</label>
                                    <input type="number" step="0.01" name="nilai_perolehan"
                                           class="form-control" placeholder="Masukkan Nilai" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Kondisi</label>
                                    <select name="kondisi" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kondisi</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('aset.index') }}" class="btn btn-secondary px-4">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save"></i> Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-muted text-center small py-2">
                        &copy; {{ date('Y') }} Sistem Data Aset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
</html>
