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
                <h1 class="display-4 text-dark mb-4 animated slideInDown">Daftar Warga</h1>
            </div>
        </div>

        <!-- Daftar Warga -->
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
                        <p class="fs-5 fw-medium fst-italic text-primary mb-1">Data Warga</p>
                        <h1 class="display-6 mb-0">Daftar Warga</h1>
                    </div>
                    <a href="{{ route('warga.create') }}" class="btn btn-primary rounded-pill">
                        <i class="bi bi-plus-circle"></i> Tambah Warga
                    </a>
                </div>
                <div class="table-responsive">
                    <form method="GET" action="{{ route('warga.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Genders</option>
                                    <option value="Laki-laki"
                                        {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                        value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                                    <button type="submit" class="input-group-text" id="basic-addon2">
                                        @if (request('search'))
                                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                                class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                        @endif
                                        <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
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

                    <div class="mt-3">
                        {{ $warga->links('pagination::bootstrap-5') }}
                    </div>

                    <div class="row g-4">
                        @forelse ($warga as $index => $item)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card h-100 shadow-lg overflow-hidden hover-card "style="border-radius: 20px;">
                                    <div class="card-body p-4 text-dark" style="background-color: #789666; ">

                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0">
                                                <i class="bi bi-person-circle text-dark" style="font-size: 2rem;"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title mb-0 fw-bold text-dark">{{ $item->nama }}</h5>
                                                <small class="text-dark">#{{ $index + 1 }}</small>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled mb-4">
                                            <li><i class="bi bi-credit-card-2-front text-dark me-2"></i><strong>No
                                                    KTP:</strong> {{ $item->no_ktp }}</li>
                                            <li><i class="bi bi-gender-ambiguous text-dark me-2"></i><strong>Jenis
                                                    Kelamin:</strong> {{ $item->jenis_kelamin }}</li>
                                            <li><i class="bi bi-book text-dark me-2"></i><strong>Agama:</strong>
                                                {{ $item->agama }}</li>
                                            <li><i class="bi bi-briefcase text-dark me-2"></i><strong>Pekerjaan:</strong>
                                                {{ $item->pekerjaan ?? '-' }}</li>
                                            <li><i class="bi bi-telephone text-dark me-2"></i><strong>Telepon:</strong>
                                                {{ $item->telp ?? '-' }}</li>
                                            <li><i class="bi bi-envelope text-dark me-2"></i><strong>Email:</strong>
                                                {{ $item->email ?? '-' }}</li>
                                        </ul>

                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('warga.edit', $item->warga_id) }}"
                                                class="btn btn-warning btn-sm rounded-pill px-3">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                <h5>Belum ada data warga.</h5>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
    </body>
@endsection

</html>
