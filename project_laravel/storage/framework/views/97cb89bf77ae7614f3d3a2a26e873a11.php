

<?php $__env->startSection('content'); ?>
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
                  action="/admin/lapangan/<?php echo e($lapangan->id); ?>"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

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
                            value="<?php echo e($lapangan->nama_lapangan); ?>"
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
                    ><?php echo e($lapangan->deskripsi); ?></textarea>
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
                        value="<?php echo e(number_format($lapangan->harga, 0, ',', '.')); ?>"
                        class="form-control">
                    </div>
                </div>

                <!-- STATUS -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif" <?php echo e($lapangan->status == 'aktif' ? 'selected' : ''); ?>>
                            Aktif
                        </option>
                        <option value="maintenance" <?php echo e($lapangan->status == 'maintenance' ? 'selected' : ''); ?>>
                            Maintenance
                        </option>
                    </select>
                </div>

                <!-- GAMBAR LAMA -->
                <div class="form-group">
                    <label>Gambar Saat Ini</label>
                    <div class="mb-2">
                        <?php if($lapangan->gambar): ?>
                            <a href="<?php echo e(\App\Helpers\StorageHelper::url($lapangan->gambar)); ?>" target="_blank">
                                <img
                                    src="<?php echo e(\App\Helpers\StorageHelper::url($lapangan->gambar)); ?>"
                                    alt="Gambar <?php echo e($lapangan->nama_lapangan); ?>"
                                    class="img-fluid rounded"
                                    style="max-width: 300px; height: auto;"
                                >
                            </a>
                        <?php else: ?>
                            <p class="text-muted mb-0">Belum ada gambar</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- GANTI GAMBAR -->
                <div class="form-group">
                    <label>Ganti Gambar</label>

                    <?php if($lapangan->gambar): ?>
                        <div class="mb-1 small text-muted">
                            Gambar saat ini: <strong><?php echo e(basename($lapangan->gambar)); ?></strong>
                        </div>
                    <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/lapangan/edit.blade.php ENDPATH**/ ?>