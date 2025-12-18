<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Identitas Pengembang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
</head>

@extends('layouts.guest.app')

@section('title', 'Identitas Pengembang')

@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Identitas Pengembang</h1>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="fs-5 fw-medium fst-italic text-primary mb-1">Profil</p>
                    <h1 class="display-6 mb-0">Identitas Pengembang</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow-lg border-0" style="border-radius: 20px;">
                        <div class="card-body p-4" style="background-color: #d9f8c4; border-radius: 20px;">

                            <div class="text-center mb-4">

                                <!-- FOTO ASLI -->
                                <img src="{{ asset('assets-guest/img/developer.jpg') }}"
                                     class="rounded-circle shadow"
                                     style="width: 150px; height:150px; object-fit:cover;"
                                     alt="Foto Pengembang">

                                <h3 class="fw-bold mt-3">Eveline Cantika Gabriela</h3>
                                <p class="mb-1">NIM: 2457301041</p>
                                <p class="mb-1">Program Studi: Sistem Informasi</p>
                            </div>

                            <hr>

                            <h5 class="fw-bold text-center">Media Sosial</h5>

                            <div class="d-flex justify-content-center gap-4 mt-3 fs-3">

                                <!-- Linkedin -->
                                <a href="https://linkedin.com/in/username" target="_blank" class="text-primary">
                                    <i class="bi bi-linkedin"></i>
                                </a>

                                <!-- Github -->
                                <a href="https://github.com/elin143" target="_blank" class="text-dark">
                                    <i class="bi bi-github"></i>
                                </a>

                                <!-- Instagram -->
                                <a href="https://www.instagram.com/xxevln7/" target="_blank" class="text-danger">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>

                            <hr>

                            <div class="text-center mt-3">
                                <p class="text-muted">
                                    Halaman ini menampilkan profil resmi pengembang aplikasi Sistem Informasi Inventaris Aset Desa.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

</html>
