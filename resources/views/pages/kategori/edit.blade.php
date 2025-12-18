<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Warga</title>
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
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Edit Kategori</h1>
        </div>
    </div>

    <!-- Form Edit Kategori -->
    <div class="container-xxl col-md-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                            <h4 class="mb-0">Form Edit Kategori</h4>
                        </div>

                        <div class="card-body p-5 bg-light">
                            <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Kode Kategori</label>
                                    <input type="text" name="kode" class="form-control"
                                        value="{{ old('kode', $kategori->kode) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Kategori</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ old('nama', $kategori->nama) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="4"
                                        placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save"></i> Update Kategori
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-muted text-center small py-2">
                            &copy; {{ date('Y') }} Sistem Data Kategori
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>
