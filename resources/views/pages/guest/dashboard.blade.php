<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Villagio - Inventaris Aset Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
</head>

@extends('layouts.guest.app')
@section('content')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('assets-guest/img/dash-1.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">
                                <p class="fs-4 text-white animated zoomIn">
                                    Selamat Datang di <strong class="text-dark">Villagio</strong>
                                </p>
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">
                                    Sistem Pengelolaan Aset Desa yang Transparan & Efisien
                                </h1>
                                <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">
                                    Pelajari Lebih Lanjut
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets-guest/img/dash-2.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">
                                <p class="fs-4 text-white animated zoomIn">
                                    Selamat Datang di <strong class="text-dark">Villagio</strong>
                                </p>
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">
                                    Digitalisasi Inventaris Aset Desa yang Lebih Mudah
                                </h1>
                                <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">
                                    Pelajari Lebih Lanjut
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>

    <!-- Carousel End -->

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

            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{ asset('assets-guest/img/desa.jpg') }}" alt="">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary">Artikel Unggulan</p>
                    <h1 class="display-6">Perkembangan Sistem Inventaris Aset Desa dari Waktu ke Waktu</h1>
                </div>
                <p class="mb-4">
                    Pengelolaan aset desa merupakan bagian penting dari pembangunan dan transparansi pemerintah desa.
                    Seiring berkembangnya teknologi, pencatatan aset yang sebelumnya dilakukan secara manual kini
                    beralih ke sistem digital yang lebih akurat, cepat, dan mudah diakses.
                </p>
                <p class="mb-4">
                    Sistem Inventaris Aset Desa membantu perangkat desa dalam memantau kondisi aset, melakukan
                    pemeliharaan, dan menyusun laporan dengan lebih efektif. Dengan data yang terpusat dan terstruktur,
                    desa dapat meningkatkan tata kelola dan pelayanan kepada masyarakat.
                </p>
                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

    <!-- Article End -->


    <!-- Video Start -->
<div class="container-fluid video my-5">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="py-5">
                    <h1 class="display-6 mb-4">
                        Sistem Inventaris <span class="text-white">Aset Desa</span> untuk
                        <span class="text-white">Transparansi</span> & <span class="text-white">Akuntabilitas</span>
                    </h1>

                    <h5 class="fw-normal lh-base fst-italic text-white mb-5">
                        Pengelolaan aset desa berbasis digital membantu pemerintahan desa dalam menjaga, mencatat,
                        dan memantau seluruh aset secara lebih akurat, cepat, dan transparan untuk kesejahteraan
                        masyarakat.
                    </h5>

                    <div class="row g-4 mb-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    <i class="fa fa-check"></i>
                                </div>
                                <span class="text-dark">Pencatatan aset lebih terstruktur</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    <i class="fa fa-check"></i>
                                </div>
                                <span class="text-dark">Pemantauan kondisi aset mudah</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    <i class="fa fa-check"></i>
                                </div>
                                <span class="text-dark">Laporan cepat & akurat</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                    <i class="fa fa-check"></i>
                                </div>
                                <span class="text-dark">Mendukung transparansi desa</span>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-light rounded-pill py-3 px-5" href="">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Video End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

@endsection
</body>

</html>
