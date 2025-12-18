<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Villagio - Inventaris Aset Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

</head>

@extends('layouts.guest.app')
@section('content')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Tentang Kami</h1>
        </div>
    </div>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s"
                                src="{{ asset('assets-guest/img/tentang-1.jpg') }}" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s"
                                src="{{ asset('assets-guest/img/tentang-3.jpg') }}" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s"
                                src="{{ asset('assets-guest/img/tentang-4.jpg') }}" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s"
                                src="{{ asset('assets-guest/img/tentang-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
    <div class="section-title">
        <p class="fs-5 fw-medium fst-italic text-primary">Tentang Sistem</p>
        <h1 class="display-6">Sejarah dan Pengembangan Sistem Inventaris Aset Desa</h1>
    </div>

    <!-- Row 1 -->
    <div class="row g-3 mb-4">
        <div class="col-sm-4">
            <img class="img-fluid bg-white w-100" src="{{ asset('assets-guest/img/tentang-5.jpg') }}" alt="">
        </div>
        <div class="col-sm-8">
            <h5>Sistem modern untuk pengelolaan aset desa yang lebih transparan</h5>
            <p class="mb-0">
                Sistem Inventaris Aset Desa dirancang untuk membantu pemerintah desa dalam mencatat,
                mengelola, dan memantau seluruh aset secara digital, cepat, dan akurat. Dengan sistem ini,
                proses pendataan menjadi lebih efisien dan minim kesalahan.
            </p>
        </div>
    </div>

    <div class="border-top mb-4"></div>

    <!-- Row 2 -->
    <div class="row g-3">
        <div class="col-sm-8">
            <h5>Mendukung pengambilan keputusan yang lebih tepat dan efektif</h5>
            <p class="mb-0">
                Dengan informasi aset yang lengkap dan terstruktur, perangkat desa dapat merencanakan
                pengelolaan, pemeliharaan, dan alokasi anggaran dengan lebih baik. Sistem ini juga
                mempermudah pelaporan kepada masyarakat dan pihak terkait.
            </p>
        </div>
        <div class="col-sm-4">
            <img class="img-fluid bg-white w-100" src="{{ asset('assets-guest/img/tentang-6.jpg') }}" alt="">
        </div>
    </div>
</div>
    <!-- About End -->
</body>
@endsection
</html>
