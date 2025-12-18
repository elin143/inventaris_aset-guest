<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Aset</title>
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
                <h1 class="display-4 text-dark mb-4 animated slideInDown">Edit Aset</h1>
            </div>
        </div>

        <!-- Form Edit Aset -->
        <div class="container-xxl col-md-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                                <h4 class="mb-0">Form Edit Data Aset</h4>
                            </div>

                            <div class="card-body p-5 bg-light">
                                <form action="{{ route('aset.update', $aset->aset_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Kode Aset</label>
                                            <input type="text" name="kode_aset" class="form-control"
                                                value="{{ old('kode_aset', $aset->kode_aset) }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Nama Aset</label>
                                            <input type="text" name="nama_aset" class="form-control"
                                                value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Kategori Aset</label>
                                            <select name="kategori_id" class="form-select" required>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Tanggal Perolehan</label>
                                            <input type="date" name="tgl_perolehan" class="form-control"
                                                value="{{ old('tgl_perolehan', $aset->tgl_perolehan) }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Nilai Perolehan</label>
                                            <input type="number" step="0.01" name="nilai_perolehan" class="form-control"
                                                value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Kondisi</label>
                                            <select name="kondisi" class="form-select" required>
                                                <option value="Baik"
                                                    {{ old('kondisi', $aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik
                                                </option>
                                                <option value="Rusak Ringan"
                                                    {{ old('kondisi', $aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
                                                    Rusak Ringan
                                                </option>
                                                <option value="Rusak Berat"
                                                    {{ old('kondisi', $aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
                                                    Rusak Berat
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tambah Foto Baru (Opsional)</label>
                                            <input type="file" name="media[]" multiple class="form-control">
                                        </div>

                                        @if ($aset->media->count())
                                            <p class="mt-2">Foto Lama:</p>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($aset->media as $media)
                                                    <img src="{{ asset('storage/' . $media->file_url) }}" width="120"
                                                        class="rounded shadow">
                                                @endforeach
                                            </div>
                                        @endif


                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('aset.index') }}" class="btn btn-secondary px-4">
                                            <i class="bi bi-arrow-left"></i> Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save"></i> Update Data
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer text-muted text-center small py-2">
                                &copy; {{ date('Y') }} Sistem Data Aset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

</html>
