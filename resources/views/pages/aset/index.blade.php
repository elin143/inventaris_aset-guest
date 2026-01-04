<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Daftar Aset')

@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Daftar Aset</h1>
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

<form method="GET" action="{{ route('aset.index') }}" class="mb-4">

            <!-- Header & Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Aset</p>
                    <h1 class="display-6 mb-0">Daftar Aset</h1>
                </div>

                @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('aset.create'))
                    <a href="{{ route('aset.create') }}" class="btn btn-primary rounded-pill">
                        <i class="bi bi-plus-circle"></i> Tambah Aset
                    </a>
                @endif
            </div>

            <!-- Search -->
            <form method="GET" action="{{ route('aset.index') }}" class="row mb-4">
                <div class="row">
                    <div class="col-md-2">
                        <select name="kondisi" class="form-select" onchange="this.form.submit()">
                            <option value="">all</option>
                            <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>
                                Baik</option>
                            <option value="Rusak Ringan" {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
                                Rusak Ringan</option>
                            <option value="Rusak Berat" {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
                                Rusak Berat</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Cari aset...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>

                            @if (request('search'))
                                <a href="{{ route('aset.index') }}" class="btn btn-outline-danger">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            @endif
                        </div>
                    </div>
            </form>

            <!-- Pagination Top -->
        <div class="mt-4">
            {{ $aset->links('pagination::bootstrap-5') }}
        </div>

            <!-- Cards -->
            <div class="row g-4">
                @forelse ($aset as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-lg border-0 h-100" style="border-radius: 18px;">
                            <div class="card-body p-4" style="background-color: #d9f8c4; border-radius: 18px;">

                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-box-seam text-dark" style="font-size: 2.2rem;"></i>
                                    <div class="ms-3">
                                        <h5 class="fw-bold text-dark mb-1">{{ $item->nama_aset }}</h5>
                                        <small class="text-muted">#{{ $index + 1 }}</small>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <li><i class="bi bi-tag me-2"></i><strong>Kategori:</strong>
                                        {{ $item->kategori->nama ?? '-' }}</li>
                                    <li><i class="bi bi-upc-scan me-2"></i><strong>Kode Aset:</strong>
                                        {{ $item->kode_aset }}</li>
                                    <li><i class="bi bi-cash-coin me-2"></i><strong>Nilai:</strong>
                                        Rp {{ number_format($item->nilai_perolehan, 0, ',', '.') }}</li>
                                    <li><i class="bi bi-calendar-check me-2"></i><strong>Tanggal:</strong>
                                        {{ $item->tgl_perolehan }}</li>
                                    <li><i class="bi bi-tools me-2"></i><strong>Kondisi:</strong>
                                        {{ $item->kondisi }}</li>
                                    <li>
                                        <i class="bi bi-images me-2"></i>
                                        <strong>Foto:</strong>

                                        @if ($item->media->count())
                                            <div class="d-flex gap-2 flex-wrap mt-2">
                                                @foreach ($item->media as $media)
                                                    <img src="{{ asset('storage/' . $media->file_url) }}" width="200">
                                                @endforeach
                                            </div>
                                        @else
                                            <img src="{{ asset('assets-guest/img/placeholder.png') }}"
                                                 class="img-fluid rounded"
                                                 style="height:180px; object-fit:cover;">
                                        @endif
                                    </li>
                                </ul>

                                <div class="d-flex justify-content-between">
                                    @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('aset.edit'))
                                        <a href="{{ route('aset.edit', $item->aset_id) }}"
                                           class="btn btn-warning btn-sm rounded-pill px-3">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    @endif

                                    @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('aset.destroy'))
                                        <form action="{{ route('aset.destroy', $item->aset_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm rounded-pill px-3">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <h5>Belum ada data aset.</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection

</html>
