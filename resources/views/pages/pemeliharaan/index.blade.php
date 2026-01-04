<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Pemeliharaan Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Daftar Pemeliharaan Aset')

@section('content')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn">
    <div class="container text-center py-5">
        <h1 class="display-4 text-dark mb-4 animated slideInDown">
            Daftar Pemeliharaan Aset
        </h1>
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

<form method="GET" action="{{ route('pemeliharaan.index') }}" class="mb-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Pemeliharaan Aset</p>
                <h1 class="display-6 mb-0">Daftar Pemeliharaan Aset</h1>
            </div>

            @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('pemeliharaan.create'))
                <a href="{{ route('pemeliharaan.create') }}" class="btn btn-primary rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Pemeliharaan
                </a>
            @endif
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('pemeliharaan.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text"
                       name="search"
                       class="form-control rounded-pill px-4"
                       placeholder="Cari nama aset / tindakan..."
                       value="{{ request('search') }}">
                <button class="btn btn-primary rounded-pill ms-2 px-4">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="row g-4">
            @forelse ($data as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg border-0 h-100" style="border-radius:18px;">
                        <div class="card-body p-4" style="background:#d9f8c4; border-radius:18px;">

                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-tools text-dark" style="font-size: 2.2rem;"></i>
                                <div class="ms-3">
                                    <h5 class="fw-bold text-dark mb-1">
                                        Pemeliharaan #{{ $item->latest_id }}
                                    </h5>
                                    <small class="text-muted">
                                        Aset: {{ $item->nama_aset }}
                                    </small>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-4 mt-3">
                                <li>
                                    <i class="bi bi-cash-stack me-2"></i>
                                    <strong>Total Biaya:</strong>
                                    Rp {{ number_format($item->total_biaya,0,',','.') }}
                                </li>
                                <li>
                                    <i class="bi bi-list-ol me-2"></i>
                                    <strong>Total Riwayat:</strong>
                                    {{ $item->total_riwayat }}
                                </li>
                            </ul>

                            <div class="d-flex justify-content-between">

                                {{-- DETAIL (ADMIN & GUEST BOLEH) --}}
                                @if(Route::has('pemeliharaan.detail'))
                                    <a href="{{ route('pemeliharaan.detail', $item->latest_id) }}"
                                       class="btn btn-info btn-sm rounded-pill px-3">
                                       <i class="bi bi-eye"></i> Detail
                                    </a>
                                @endif

                                {{-- EDIT (ADMIN ONLY) --}}
                                @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('pemeliharaan.edit'))
                                    <a href="{{ route('pemeliharaan.edit', $item->latest_id) }}"
                                       class="btn btn-warning btn-sm rounded-pill px-3">
                                       <i class="bi bi-pencil"></i> Edit
                                    </a>
                                @endif

                                {{-- HAPUS (ADMIN ONLY) --}}
                                @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('pemeliharaan.destroy'))
                                    <form action="{{ route('pemeliharaan.destroy', $item->latest_id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus pemeliharaan terbaru untuk aset ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm rounded-pill px-3">
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
                    <h5>Belum ada data pemeliharaan.</h5>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

@endsection

</html>
