@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-edit mr-2"></i>Edit Lapangan
        </h4>

        <a href="/admin/lapangan" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST"
                  action="/admin/lapangan/{{ $lapangan->id }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- VALIDATION ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- NAMA LAPANGAN -->
                <div class="form-group">
                    <label>Nama Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-table-tennis"></i>
                            </span>
                        </div>
                        <input
                            type="text"
                            name="nama_lapangan"
                            class="form-control"
                            value="{{ $lapangan->nama_lapangan }}"
                            required
                        >
                    </div>
                </div>

                <!-- DESKRIPSI LAPANGAN -->
                <div class="form-group">
                    <label>Deskripsi Lapangan</label>
                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="5"
                        placeholder="Masukkan deskripsi lapangan (opsional)"
                    >{{ $lapangan->deskripsi }}</textarea>
                    <small class="text-muted">
                        Deskripsikan fasilitas, kondisi, dan keunggulan lapangan ini
                    </small>
                </div>

                <!-- HARGA -->
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-money-bill-wave"></i>
                            </span>
                        </div>
                        <input type="text" 
                        name="harga"
                        value="{{ number_format($lapangan->harga, 0, ',', '.') }}"
                        class="form-control">
                    </div>
                </div>

                <!-- STATUS -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif" {{ $lapangan->status == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="maintenance" {{ $lapangan->status == 'maintenance' ? 'selected' : '' }}>
                            Maintenance
                        </option>
                    </select>
                </div>

                <!-- GAMBAR LAMA -->
                <div class="form-group">
                    <label>Gambar Saat Ini</label>
                    <div class="mb-2">
                        @if($lapangan->gambar)
                            <a href="{{ \App\Helpers\StorageHelper::url($lapangan->gambar) }}" target="_blank">
                                <img
                                    src="{{ \App\Helpers\StorageHelper::url($lapangan->gambar) }}"
                                    alt="Gambar {{ $lapangan->nama_lapangan }}"
                                    class="img-fluid rounded"
                                    style="max-width: 300px; height: auto;"
                                >
                            </a>
                        @else
                            <p class="text-muted mb-0">Belum ada gambar</p>
                        @endif
                    </div>
                </div>

                <!-- GANTI GAMBAR -->
                <div class="form-group">
                    <label>Ganti Gambar</label>

                    @if($lapangan->gambar)
                        <div class="mb-1 small text-muted">
                            Gambar saat ini: <strong>{{ basename($lapangan->gambar) }}</strong>
                        </div>
                    @endif

                    <div class="custom-file">
                        <input
                            type="file"
                            name="gambar"
                            class="custom-file-input"
                            accept="image/*"
                        >
                        <label class="custom-file-label">
                            Pilih gambar baru (opsional)
                        </label>
                    </div>

                    <small class="text-muted">
                        Jika memilih file baru, gambar lama akan diganti
                    </small>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
