<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>
@extends('layouts.guest.app')
@section('content')
<body>
    <!-- Spinner -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <!-- Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Daftar Kategori</h1>
        </div>
    </div>

    <!-- Daftar Kategori -->
    <div class="container-xxl py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Kategori</p>
                    <h1 class="display-6 mb-0">Daftar Kategori Aset</h1>
                </div>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Kategori
                </a>
            </div>

            <div class="row g-4">
                @forelse ($kategori as $index => $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card h-100 shadow-lg overflow-hidden hover-card" style="border-radius: 20px;">
                            <div class="card-body p-4 text-dark" style="background-color: #d9f8c4;">

                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-tags-fill text-dark" style="font-size: 2rem;"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="card-title mb-0 fw-bold text-dark">{{ $item->nama }}</h5>
                                        <small class="text-dark">#{{ $index + 1 }}</small>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <li><i class="bi bi-upc-scan text-dark me-2"></i><strong>Kode:</strong> {{ $item->kode }}</li>
                                    <li><i class="bi bi-file-earmark-text text-dark me-2"></i><strong>Deskripsi:</strong> {{ $item->deskripsi ?? '-' }}</li>
                                </ul>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('kategori.edit', $item->kategori_id) }}"
                                        class="btn btn-warning btn-sm rounded-pill px-3">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <h5>Belum ada data kategori.</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
@endsection
</html>
