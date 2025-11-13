<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register | Sistem Data Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">

    <style>
        body {
            background-color: #f5f8f2;
        }

        .register-card {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 40px 35px;
        }

        .register-card h3 {
            color: #789666;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .btn-register {
            background-color: #789666;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            color: white;
            font-weight: 600;
        }

        .btn-register:hover {
            background-color: #5b7250;
        }

        .text-primary {
            color: #789666 !important;
        }
    </style>
</head>
@extends('layouts.auth.app')
@section('content')
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-10">
                <div class="register-card">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets-guest/img/icon.png') }}" alt="Logo" width="80">
                        <h3 class="mt-3">Buat Akun Baru</h3>
                        <p class="text-muted">Isi data berikut untuk mendaftar</p>
                    </div>

                    {{-- Pesan sukses atau error --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Form Register --}}
                    <form action="{{ route('register.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email"
                                placeholder="Masukkan email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password"
                                placeholder="Masukkan password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password"
                                class="form-control"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Ulangi password" required>
                        </div>

                        <button type="submit" class="btn btn-register w-100 mt-2">Daftar Sekarang</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-primary fw-semibold">Login di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>
