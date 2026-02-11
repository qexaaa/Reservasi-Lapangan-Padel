@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="mb-4">
        <h4>
            <i class="fas fa-calendar-plus mr-2"></i> Reservasi Lapangan
        </h4>
        <p class="text-muted mb-0">
            Silakan isi form untuk melakukan reservasi lapangan
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST" action="/customer/reservasi">
                @csrf

                <!-- LAPANGAN -->
                <div class="form-group">
                    <label>Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-table-tennis"></i>
                            </span>
                        </div>

                        <select name="lapangan_id"
                                id="lapanganSelect"
                                class="form-control"
                                required>
                            <option value="">-- Pilih Lapangan --</option>
                            @foreach($lapangan as $l)
                                <option value="{{ $l->id }}"
                                    data-image="{{ \App\Helpers\StorageHelper::url($l->gambar) }}"
                                    {{ (old('lapangan_id') ?? request('lapangan_id')) == $l->id ? 'selected' : '' }}>
                                    {{ $l->nama_lapangan }} — Rp{{ number_format($l->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- PREVIEW GAMBAR LAPANGAN -->
                <div id="lapanganPreview" class="mb-4 text-center" style="display:none;">
                    <img id="lapanganImage"
                         src=""
                         class="img-fluid rounded shadow-sm"
                         style="max-height:300px;">
                </div>

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-day"></i>
                            </span>
                        </div>
                        <input type="date"
                               name="tanggal"
                               id="tanggalInput"
                               class="form-control"
                               value="{{ request('tanggal') }}"
                               required>
                    </div>
                </div>

                @if(request('tanggal') && $jadwals->isEmpty())
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle"></i>
                        Tidak ada jadwal tersedia untuk tanggal yang dipilih.
                    </div>
                @endif

                <!-- JAM MAIN -->
                <div class="form-group">
                    <label>Jam Main</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>

                        <select name="jadwal_id"
                                id="jadwalSelect"
                                class="form-control"
                                required>
                            <option value="">-- Pilih Jam --</option>
                            @foreach($jadwals as $j)
                                <option value="{{ $j->id }}"
                                        data-lapangan="{{ $j->lapangan_id }}">
                                    {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="/customer/dashboard" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Reservasi
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

{{-- SCRIPT FILTER JAM + PREVIEW GAMBAR --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const lapanganSelect = document.getElementById('lapanganSelect');
    const jadwalSelect   = document.getElementById('jadwalSelect');
    const previewBox    = document.getElementById('lapanganPreview');
    const previewImage  = document.getElementById('lapanganImage');
    const tanggalInput  = document.getElementById('tanggalInput');

    // SIMPAN SEMUA JADWAL
    const allOptions = Array.from(jadwalSelect.options).slice(1);

    function filterJadwal() {
        const lapanganId = lapanganSelect.value;

        jadwalSelect.innerHTML = '<option value="">-- Pilih Jam --</option>';

        if (!lapanganId) return;

        allOptions.forEach(option => {
            if (option.dataset.lapangan === lapanganId) {
                jadwalSelect.appendChild(option.cloneNode(true));
            }
        });
    }

    function showPreview() {
        const selectedOption = lapanganSelect.selectedOptions[0];
        const imageUrl = selectedOption?.dataset.image;

        if (imageUrl) {
            previewImage.src = imageUrl;
            previewBox.style.display = 'block';
        } else {
            previewBox.style.display = 'none';
        }
    }

    lapanganSelect.addEventListener('change', function () {
        filterJadwal();
        showPreview();
    });

    tanggalInput.addEventListener('change', function () {
        const tanggal = this.value;
        const lapanganId = lapanganSelect.value;
        // Reload halaman dengan parameter tanggal & lapangan_id
        window.location.href = `?tanggal=${tanggal}&lapangan_id=${lapanganId}`;
    });

    // Saat reload (jika old value ada)
    if (lapanganSelect.value) {
        filterJadwal();
        showPreview();
    }
});
</script>
@endsection
