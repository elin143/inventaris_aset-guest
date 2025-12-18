<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Pemeliharaan Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Detail Pemeliharaan Aset')

@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">
                Detail Pemeliharaan Aset
            </h1>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- Header -->
            <div class="mb-4">
                <p class="fs-5 fw-medium fst-italic text-primary mb-1">
                    Informasi Lengkap Pemeliharaan
                </p>
                <h1 class="display-6 mb-0">
                    Pemeliharaan #{{ $pemeliharaan->pemeliharaan_id }}
                </h1>
            </div>

            <div class="row g-4">

                <!-- Card Detail -->
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0"
                        style="border-radius: 18px;">
                        <div class="card-body p-4"
                            style="background-color: #d9f8c4; border-radius: 18px;">

                            <ul class="list-unstyled mb-4">

                                <li class="mb-2">
                                    <i class="bi bi-box-seam me-2"></i>
                                    <strong>Aset:</strong>
                                    {{ $pemeliharaan->aset->nama_aset ?? '-' }}
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <strong>Tanggal:</strong>
                                    {{ \Carbon\Carbon::parse($pemeliharaan->tanggal)->format('d M Y') }}
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-wrench-adjustable me-2"></i>
                                    <strong>Tindakan:</strong>
                                    {{ $pemeliharaan->tindakan }}
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-person-badge me-2"></i>
                                    <strong>Pelaksana:</strong>
                                    {{ $pemeliharaan->pelaksana }}
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-cash-stack me-2"></i>
                                    <strong>Biaya:</strong>
                                    Rp {{ number_format($pemeliharaan->biaya, 0, ',', '.') }}
                                </li>

                            </ul>

                            <div class="d-flex gap-2">
                                <a href="{{ route('pemeliharaan.index') }}"
                                    class="btn btn-secondary rounded-pill px-4">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>

                                <a href="{{ route('pemeliharaan.edit', $pemeliharaan->pemeliharaan_id) }}"
                                    class="btn btn-warning rounded-pill px-4">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card Bukti -->
                <div class="col-lg-4">
                    <div class="card shadow-lg border-0"
                        style="border-radius: 18px;">
                        <div class="card-body p-4 bg-light"
                            style="border-radius: 18px;">

                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-images me-2"></i>
                                Bukti Pemeliharaan
                            </h5>

                            @if ($pemeliharaan->media->isNotEmpty())
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach ($pemeliharaan->media as $media)
                                        <img src="{{ asset('storage/' . $media->file_url) }}"
                                            class="img-fluid rounded"
                                            style="max-width: 150px;">
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">
                                    Tidak ada bukti pemeliharaan.
                                </p>
                            @endif

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

</html>
