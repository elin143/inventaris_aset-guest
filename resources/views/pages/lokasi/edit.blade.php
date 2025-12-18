@extends('layouts.guest.app')

@section('content')

    <!-- Spinner -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary"></div>
    </div>

    <!-- Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-dark mb-4 animated slideInDown">Edit Lokasi Aset</h1>
        </div>
    </div>

    <!-- Form Edit Lokasi -->
    <div class="container-xxl col-md-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                            <h4 class="mb-0">Form Edit Data Lokasi</h4>
                        </div>

                        <div class="card-body p-5 bg-light">

                            <form action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Aset</label>
                                        <select name="aset_id" class="form-select" required>
                                            @foreach ($aset as $a)
                                                <option value="{{ $a->aset_id }}"
                                                    {{ $lokasi->aset_id == $a->aset_id ? 'selected' : '' }}>
                                                    {{ $a->nama_aset }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Keterangan Lokasi</label>
                                        <input type="text" name="keterangan" class="form-control"
                                            value="{{ old('keterangan', $lokasi->keterangan) }}" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Lokasi (Teks)</label>
                                        <textarea name="lokasi_text" class="form-control" rows="3" required>{{ old('lokasi_text', $lokasi->lokasi_text) }}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">RT</label>
                                        <input type="text" name="rt" class="form-control"
                                            value="{{ old('rt', $lokasi->rt) }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">RW</label>
                                        <input type="text" name="rw" class="form-control"
                                            value="{{ old('rw', $lokasi->rw) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tambah Foto Lokasi Baru (Opsional)</label>
                                        <input type="file" name="media[]" multiple class="form-control" accept="image/*">
                                    </div>

                                    @if ($lokasi->media->count())
                                        <p class="mt-2 fw-bold">Foto Lokasi Lama:</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($lokasi->media as $media)
                                                <img src="{{ asset('storage/' . $media->file_url) }}" width="120"
                                                    class="rounded shadow">
                                            @endforeach
                                        </div>
                                    @endif

                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('lokasi.index') }}" class="btn btn-secondary px-4">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>

                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save"></i> Update Data
                                    </button>
                                </div>

                            </form>

                        </div>

                        <div class="card-footer text-muted text-center small py-2">
                            &copy; {{ date('Y') }} Sistem Data Lokasi
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
