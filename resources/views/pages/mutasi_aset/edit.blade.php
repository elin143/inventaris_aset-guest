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
                <h1 class="display-4 text-dark mb-4 animated slideInDown">Edit Mutasi Aset</h1>
            </div>
        </div>

        <!-- Form Edit Mutasi -->
        <div class="container-xxl col-md-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                                <h4 class="mb-0">Form Edit Data Mutasi Aset</h4>
                            </div>

                            <div class="card-body p-5 bg-light">

                                <form action="{{ route('mutasi-aset.update', $mutasi->mutasi_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Pilih Aset</label>
                                            <select name="aset_id" class="form-select" required>
                                                @foreach ($aset as $item)
                                                    <option value="{{ $item->aset_id }}"
                                                        {{ $mutasi->aset_id == $item->aset_id ? 'selected' : '' }}>
                                                        {{ $item->nama_aset }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Tanggal Mutasi</label>
                                            <input type="date" name="tanggal" class="form-control"
                                                value="{{ old('tanggal', $mutasi->tanggal) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Jenis Mutasi</label>
                                            <input type="text" name="jenis_mutasi" class="form-control"
                                                value="{{ old('jenis_mutasi', $mutasi->jenis_mutasi) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $mutasi->keterangan) }}</textarea>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('mutasi-aset.index') }}" class="btn btn-secondary px-4">
                                            <i class="bi bi-arrow-left"></i> Kembali
                                        </a>

                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save"></i> Update Data
                                        </button>
                                    </div>

                                </form>

                            </div>

                            <div class="card-footer text-muted text-center small py-2">
                                &copy; {{ date('Y') }} Sistem Data Mutasi Aset
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
