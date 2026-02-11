

<?php $__env->startSection('content'); ?>
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
                <?php echo csrf_field(); ?>

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
                            <?php $__currentLoopData = $lapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($l->id); ?>"
                                    data-image="<?php echo e(\App\Helpers\StorageHelper::url($l->gambar)); ?>"
                                    <?php echo e((old('lapangan_id') ?? request('lapangan_id')) == $l->id ? 'selected' : ''); ?>>
                                    <?php echo e($l->nama_lapangan); ?> — Rp<?php echo e(number_format($l->harga, 0, ',', '.')); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                               value="<?php echo e(request('tanggal')); ?>"
                               required>
                    </div>
                </div>

                <?php if(request('tanggal') && $jadwals->isEmpty()): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle"></i>
                        Tidak ada jadwal tersedia untuk tanggal yang dipilih.
                    </div>
                <?php endif; ?>

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
                            <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($j->id); ?>"
                                        data-lapangan="<?php echo e($j->lapangan_id); ?>">
                                    <?php echo e($j->jam_mulai); ?> - <?php echo e($j->jam_selesai); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/customer/reservasi/index.blade.php ENDPATH**/ ?>