@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Lapangan
        </h4>

        <a href="/admin/lapangan" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST" action="/admin/lapangan" enctype="multipart/form-data">
                @csrf

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
                            placeholder="Masukkan nama lapangan"
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
                    ></textarea>
                    <small class="text-muted">
                        Deskripsikan fasilitas, kondisi, dan keunggulan lapangan ini
                    </small>
                </div>

                <!-- GAMBAR LAPANGAN -->
                <div class="form-group">
                    <label>Gambar Lapangan</label>
                    <div class="custom-file">
                        <input
                            type="file"
                            name="gambar"
                            id="gambar"
                            class="custom-file-input"
                            accept="image/*"
                            required
                        >
                        <label class="custom-file-label">Pilih gambar</label>
                    </div>
                    <small class="text-muted">
                        Format: JPG, PNG | Maks 2MB
                    </small>
                    <!-- PREVIEW GAMBAR -->
                    <div id="gambarPreview" class="mt-3" style="display: none;">
                        <small class="text-muted d-block mb-2">Preview:</small>
                        <img id="previewImg" src="" alt="Preview" class="img-fluid rounded" style="max-width: 300px; max-height: 250px; object-fit: cover;">
                    </div>
                </div>

                <!-- HARGA -->
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input
                            type="text"
                            name="harga"
                            id="harga"
                            class="form-control"
                            placeholder="Contoh: 190.000"
                            required
                        >
                    </div>
                    <small class="text-muted">
                        Gunakan format ribuan (contoh: 190.000)
                    </small>
                </div>

                <!-- STATUS -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

{{-- SCRIPT FORMAT HARGA & PREVIEW GAMBAR --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hargaInput = document.getElementById('harga');
    const gambarInput = document.getElementById('gambar');
    const gambarPreview = document.getElementById('gambarPreview');
    const previewImg = document.getElementById('previewImg');

    // FORMAT HARGA
    hargaInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        this.value = new Intl.NumberFormat('id-ID').format(value);
    });

    // PREVIEW GAMBAR
    gambarInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                previewImg.src = event.target.result;
                gambarPreview.style.display = 'block';
                // Update label dengan nama file
                document.querySelector('.custom-file-label').innerText = file.name;
            };
            reader.readAsDataURL(file);
        }
    });

    // agar value yang dikirim bersih (tanpa titik)
    document.querySelector('form').addEventListener('submit', function () {
        hargaInput.value = hargaInput.value.replace(/\./g, '');
    });
});
</script>
@endsection
