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

    <!-- Page Header -->
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

            <!-- Header & Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">
                        Data Pemeliharaan Aset
                    </p>
                    <h1 class="display-6 mb-0">Daftar Pemeliharaan Aset</h1>
                </div>
                <a href="{{ route('pemeliharaan.create') }}"
                    class="btn btn-primary rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Pemeliharaan
                </a>
            </div>

            <!-- Cards -->
            <div class="row g-4">
                @forelse ($data as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-lg border-0 h-100"
                            style="border-radius: 18px;">
                            <div class="card-body p-4"
                                style="background-color: #d9f8c4; border-radius: 18px;">

                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-tools text-dark"
                                        style="font-size: 2.2rem;"></i>
                                    <div class="ms-3">
                                        <h5 class="fw-bold text-dark mb-1">
                                            Pemeliharaan #{{ $item->pemeliharaan_id }}
                                        </h5>
                                        <small class="text-muted">
                                            Aset: {{ $item->aset->nama_aset ?? '-' }}
                                        </small>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <li>
                                        <i class="bi bi-cash-stack me-2"></i>
                                        <strong>Total Biaya:</strong>
                                        Rp {{ number_format($item->total_biaya, 0, ',', '.') }}
                                    </li>
                                </ul>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('pemeliharaan.detail', $item->pemeliharaan_id) }}"
                                        class="btn btn-info btn-sm rounded-pill px-3">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>

                                    <a href="{{ route('pemeliharaan.edit', $item->pemeliharaan_id) }}"
                                        class="btn btn-warning btn-sm rounded-pill px-3">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    <form action="{{ route('pemeliharaan.destroy', $item->pemeliharaan_id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data pemeliharaan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm rounded-pill px-3">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <h5>Belum ada data pemeliharaan aset.</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection

</html>
