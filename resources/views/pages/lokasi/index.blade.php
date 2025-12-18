<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Lokasi Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Daftar Lokasi Aset')

@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Daftar Lokasi Aset</h1>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Header & Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Lokasi Aset</p>
                    <h1 class="display-6 mb-0">Daftar Lokasi Aset</h1>
                </div>
                <a href="{{ route('lokasi.create') }}" class="btn btn-primary rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Lokasi
                </a>
            </div>

            <!-- Search -->
            <form method="GET" action="{{ route('lokasi.index') }}" class="row mb-4" enc>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Cari berdasarkan keterangan / lokasi...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>

                            @if (request('search'))
                                <a href="{{ route('lokasi.index') }}" class="btn btn-outline-danger">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            @endif
                        </div>
                    </div>
            </form>

            <!-- Pagination Top -->
            <div class="d-flex justify-content-center mb-4">
                {{ $lokasi->links('pagination::bootstrap-5') }}
            </div>

            <!-- Cards -->
            <div class="row g-4">
                @forelse ($lokasi as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-lg border-0 h-100" style="border-radius: 18px;">
                            <div class="card-body p-4" style="background-color: #d9f8c4; border-radius: 18px;">

                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-geo-alt text-dark" style="font-size: 2.2rem;"></i>
                                    <div class="ms-3">
                                        <h5 class="fw-bold text-dark mb-1">
                                            Lokasi #{{ $index + 1 }}
                                        </h5>
                                        <small class="text-muted">Aset: {{ $item->aset->nama_aset ?? '-' }}</small>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <li>
                                        <i class="bi bi-info-circle me-2"></i>
                                        <strong>Keterangan:</strong> {{ $item->keterangan ?? '-' }}
                                    </li>

                                    <li>
                                        <i class="bi bi-map me-2"></i>
                                        <strong>Lokasi:</strong> {{ $item->lokasi_text ?? '-' }}
                                    </li>

                                    <li>
                                        <i class="bi bi-signpost-split me-2"></i>
                                        <strong>RT:</strong> {{ $item->rt ?? '-' }}
                                    </li>

                                    <li>
                                        <i class="bi bi-signpost me-2"></i>
                                        <strong>RW:</strong> {{ $item->rw ?? '-' }}
                                    </li>

                                    <li>
                                        <i class="bi bi-images me-2"></i>
                                        <strong>Foto:</strong>

                                        @if ($item->media->isNotEmpty())
                                            <img src="{{ asset('storage/' . $item->media->first()->file_url) }}"
                                                class="img-fluid rounded" style="height:180px; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('assets-guest/img/placeholder.png') }}" class="img-fluid rounded"
                                                style="height:180px; object-fit:cover;">
                                        @endif
                                    </li>

                                </ul>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('lokasi.edit', $item->lokasi_id) }}"
                                        class="btn btn-warning btn-sm rounded-pill px-3">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    <form action="{{ route('lokasi.destroy', $item->lokasi_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus lokasi aset ini?')">
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
                        <h5>Belum ada data lokasi aset.</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection

</html>
