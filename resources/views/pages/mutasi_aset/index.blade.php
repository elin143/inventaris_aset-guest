<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Mutasi Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Daftar Mutasi Aset')

@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Daftar Mutasi Aset</h1>
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

            @php
                if (auth()->check() && auth()->user()->role === 'admin' && Route::has('admin.mutasi.index')) {
                    $mutasiIndexRoute = route('admin.mutasi.index');
                } elseif (Route::has('guest.mutasi.index')) {
                    $mutasiIndexRoute = route('guest.mutasi.index');
                } else {
                    $mutasiIndexRoute = '#';
                }
            @endphp

            <!-- Header & Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Mutasi Aset</p>
                    <h1 class="display-6 mb-0">Daftar Mutasi Aset</h1>
                </div>

                @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('mutasi-aset.create'))
                    <a href="{{ route('mutasi-aset.create') }}" class="btn btn-primary rounded-pill">
                        <i class="bi bi-plus-circle"></i> Tambah Mutasi
                    </a>
                @endif
            </div>

            <!-- Search -->
<form method="GET" action="{{ route('mutasi-aset.index') }}" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text"
                       name="search"
                       class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Cari berdasarkan keterangan / lokasi..."
                       aria-label="Search">

                <button type="submit" class="input-group-text">
                    @if (request('search'))
                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                           class="btn btn-outline-secondary ml-3"
                           id="clear-search">
                            Clear
                        </a>
                    @endif

                    <svg class="icon icon-xxs"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>
        <div class="mt-4">
            {{ $mutasi ->links('pagination::bootstrap-5') }}
        </div>
            <!-- Cards -->
            <div class="row g-4">
                @forelse ($mutasi as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-lg border-0 h-100" style="border-radius: 18px;">
                            <div class="card-body p-4" style="background-color: #d9f8c4; border-radius: 18px;">

                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-arrow-left-right text-dark" style="font-size: 2.2rem;"></i>
                                    <div class="ms-3">
                                        <h5 class="fw-bold text-dark mb-1">
                                            Mutasi #{{ $index + 1 }}
                                        </h5>
                                        <small class="text-muted">
                                            Aset: {{ $item->aset->nama_aset ?? '-' }}
                                        </small>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <li>
                                        <i class="bi bi-calendar-event me-2"></i>
                                        <strong>Tanggal:</strong>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    </li>

                                    <li>
                                        <i class="bi bi-shuffle me-2"></i>
                                        <strong>Jenis Mutasi:</strong>
                                        {{ $item->jenis_mutasi ?? '-' }}
                                    </li>

                                    <li>
                                        <i class="bi bi-info-circle me-2"></i>
                                        <strong>Keterangan:</strong>
                                        {{ $item->keterangan ?? '-' }}
                                    </li>
                                </ul>

                                <div class="d-flex justify-content-between">
                                    @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('mutasi-aset.edit'))
                                        <a href="{{ route('mutasi-aset.edit', $item->mutasi_id) }}"
                                           class="btn btn-warning btn-sm rounded-pill px-3">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    @endif

                                    @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('mutasi-aset.destroy'))
                                        <form action="{{ route('mutasi-aset.destroy', $item->mutasi_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data mutasi aset ini?')">
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
                        <h5>Belum ada data mutasi aset.</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection

</html>
