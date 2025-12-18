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
            <h1 class="display-4 text-dark mb-4 animated slideInDown">
                Edit Pemeliharaan Aset
            </h1>
        </div>
    </div>

    <!-- Form Edit Pemeliharaan -->
    <div class="container-xxl col-md-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                            <h4 class="mb-0">Form Edit Data Pemeliharaan Aset</h4>
                        </div>

                        <div class="card-body p-5 bg-light">

                            <form action="{{ route('pemeliharaan.update', $pemeliharaan->pemeliharaan_id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <!-- Aset (readonly biar aman) -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Aset</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pemeliharaan->aset->nama_aset ?? '-' }}"
                                            readonly>
                                    </div>

                                    <!-- Tanggal -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Tanggal Pemeliharaan</label>
                                        <input type="date" name="tanggal" class="form-control"
                                            value="{{ old('tanggal', $pemeliharaan->tanggal) }}" required>
                                    </div>

                                    <!-- Pelaksana -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Pelaksana</label>
                                        <input type="text" name="pelaksana" class="form-control"
                                            value="{{ old('pelaksana', $pemeliharaan->pelaksana) }}" required>
                                    </div>

                                    <!-- Tindakan -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Tindakan Pemeliharaan</label>
                                        <textarea name="tindakan" class="form-control" rows="3"
                                            required>{{ old('tindakan', $pemeliharaan->tindakan) }}</textarea>
                                    </div>

                                    <!-- Biaya -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Biaya Pemeliharaan</label>
                                        <input type="number" name="biaya" class="form-control"
                                            value="{{ old('biaya', $pemeliharaan->biaya) }}" required>
                                    </div>

                                    <!-- Upload Bukti Baru -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">
                                            Tambah Bukti Pemeliharaan Baru (Opsional)
                                        </label>
                                        <input type="file" name="media[]" multiple
                                            class="form-control" accept="image/*">
                                    </div>

                                    <!-- Bukti Lama -->
                                    @if ($pemeliharaan->media->count())
                                        <p class="mt-2 fw-bold">Bukti Pemeliharaan Lama:</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($pemeliharaan->media as $media)
                                                <img src="{{ asset('storage/' . $media->file) }}"
                                                    width="120"
                                                    class="rounded shadow">
                                            @endforeach
                                        </div>
                                    @endif

                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('pemeliharaan.index') }}"
                                        class="btn btn-secondary px-4">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>

                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save"></i> Update Data
                                    </button>
                                </div>

                            </form>

                        </div>

                        <div class="card-footer text-muted text-center small py-2">
                            &copy; {{ date('Y') }} Sistem Pemeliharaan Aset
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
