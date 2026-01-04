<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <!-- Office / Desa Info -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-primary mb-4">Kantor Desa</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary me-3"></i>
                    Desa Sukamaju, Kecamatan Sejahtera, Indonesia
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt text-primary me-3"></i>
                    0812-3456-7890
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary me-3"></i>
                    desa@sukamaju.id
                </p>

                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

<!-- Quick Links -->
<div class="col-lg-3 col-md-6">
    <h4 class="text-primary mb-4">Navigasi Cepat</h4>

    <a class="btn btn-link" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="btn btn-link" href="{{ route('tentang') }}">Tentang Sistem</a>

    {{-- DATA ASET (ADMIN & GUEST) --}}
    @php
        $asetRoute = auth()->check() && auth()->user()->role === 'admin'
            ? (Route::has('admin.aset.index') ? route('admin.aset.index') : '#')
            : (Route::has('guest.aset.index') ? route('guest.aset.index') : '#');
    @endphp
    <a class="btn btn-link" href="{{ $asetRoute }}">Data Aset</a>

    {{-- DATA WARGA (ADMIN SAJA) --}}
    @if(auth()->check() && auth()->user()->role === 'admin' && Route::has('admin.warga.index'))
        <a class="btn btn-link" href="{{ route('admin.warga.index') }}">Data Warga</a>
    @endif

    <a class="btn btn-link" href="{{ route('developer') }}">Identitas Pengembang</a>
</div>


            <!-- Business Hours / Jam Pelayanan -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-primary mb-4">Jam Pelayanan</h4>
                <p class="mb-1">Senin - Jumat</p>
                <h6 class="text-light">08:00 - 16:00</h6>
                <p class="mb-1">Sabtu</p>
                <h6 class="text-light">08:00 - 12:00</h6>
                <p class="mb-1">Minggu & Libur Nasional</p>
                <h6 class="text-light">Tutup</h6>
            </div>

            <!-- Newsletter / Informasi -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-primary mb-4">Informasi Sistem</h4>
                <p>Sistem Informasi Aset Desa dirancang untuk mempermudah pengelolaan aset desa secara modern, cepat, dan akurat.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Masukkan email Anda">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        Daftar
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->
