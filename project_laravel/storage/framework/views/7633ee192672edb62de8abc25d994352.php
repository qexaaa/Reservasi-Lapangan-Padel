

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-edit mr-2"></i>Edit Jadwal
        </h4>

        <a href="<?php echo e(route('admin.jadwal.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="<?php echo e(route('admin.jadwal.update', $jadwal->id)); ?>"
                  method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- LAPANGAN (READ ONLY / OPTIONAL SELECT) -->
                <div class="form-group">
                    <label>Lapangan</label>
                    <input type="text"
                           class="form-control"
                           value="<?php echo e($jadwal->lapangan->nama_lapangan); ?>"
                           readonly>
                    
                    <input type="hidden"
                            name="lapangan_id"
                            value="<?php echo e($jadwal->lapangan_id); ?>">

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="<?php echo e($jadwal->tanggal); ?>"
                           required>
                </div>

                <!-- JAM MULAI -->
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <input type="time"
                           name="jam_mulai"
                           class="form-control"
                           value="<?php echo e($jadwal->jam_mulai); ?>"
                           required>
                </div>

                <!-- JAM SELESAI -->
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time"
                           name="jam_selesai"
                           class="form-control"
                           value="<?php echo e($jadwal->jam_selesai); ?>"
                           required>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Jadwal
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/jadwal/edit.blade.php ENDPATH**/ ?>