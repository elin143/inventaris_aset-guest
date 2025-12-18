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
                <h1 class="display-4 text-dark mb-4 animated slideInDown">Tambah Mutasi Aset</h1>
            </div>
        </div>

        <!-- Form Tambah Mutasi -->
        <div class="container-xxl col-md-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                                <h4 class="mb-0">Form Tambah Data Mutasi Aset</h4>
                            </div>

                            <div class="card-body p-5 bg-light">

                                <form action="{{ route('mutasi-aset.store') }}" method="POST">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Pilih Aset</label>
                                            <select name="aset_id" class="form-select" required>
                                                <option value="">-- Pilih Aset --</option>
                                                @foreach ($aset as $item)
                                                    <option value="{{ $item->aset_id }}">{{ $item->nama_aset }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Tanggal Mutasi</label>
                                            <input type="date" name="tanggal" class="form-control" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Jenis Mutasi</label>
                                            <input type="text" name="jenis_mutasi" class="form-control"
                                                placeholder="Contoh: Pindah Ruangan / Dipinjam / Dihibahkan" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="3"
                                                placeholder="Masukkan keterangan mutasi"></textarea>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('mutasi-aset.index') }}" class="btn btn-secondary px-4">
                                            <i class="bi bi-arrow-left"></i> Kembali
                                        </a>

                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save"></i> Simpan Data
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
