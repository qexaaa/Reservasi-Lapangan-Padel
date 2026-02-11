

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-file-alt mr-2"></i>Dashboard Laporan
            </h4>
            <p class="text-muted mb-0">
                Ringkasan dan laporan transaksi
            </p>
        </div>

        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- SUMMARY -->
    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-calendar-check fa-2x text-primary mb-2"></i>
                    <h6 class="text-muted">Total Reservasi</h6>
                    <h4><?php echo e($totalReservasi ?? 0); ?></h4>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="fas fa-money-bill-wave fa-2x text-success mb-2"></i>
                    <h6 class="text-muted">Total Transaksi</h6>
                    <h4>Rp<?php echo e(number_format($totalTransaksi ?? 0, 0, ',', '.')); ?></h4>
                </div>
            </div>
        </div>

    </div>

    <!-- MENU -->
    <div class="row">

        <div class="col-md-6">
            <a href="<?php echo e(route('admin.laporan.transaksi')); ?>"
               class="card shadow-sm border-0 text-decoration-none">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-receipt fa-2x text-info mr-3"></i>
                    <div>
                        <h6 class="mb-1">Laporan Transaksi</h6>
                        <small class="text-muted">
                            Detail pembayaran dan status reservasi
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="<?php echo e(route('admin.laporan.reservasi')); ?>"
               class="card shadow-sm border-0 text-decoration-none">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-list fa-2x text-warning mr-3"></i>
                    <div>
                        <h6 class="mb-1">Laporan Reservasi</h6>
                        <small class="text-muted">
                            Data reservasi berdasarkan tanggal
                        </small>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/laporan/index.blade.php ENDPATH**/ ?>