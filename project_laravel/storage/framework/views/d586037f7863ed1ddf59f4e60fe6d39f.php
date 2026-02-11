<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="mb-4">
        <h4>
            <i class="fas fa-user-shield mr-2"></i>Dashboard Admin
        </h4>
        <p class="text-muted mb-0">Kelola sistem reservasi lapangan padel</p>
    </div>

    <!-- STAT CARD -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check fa-2x text-primary mb-2"></i>
                    <h6 class="text-muted">Total Reservasi</h6>
                    <h3 class="mb-0"><?php echo e($totalReservasi); ?></h3>
                </div>
            </div>
        </div>
        
         <!-- RESERVASI PENDING -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                    <h6 class="text-muted">Reservasi Pending</h6>
                    <h3 class="mb-0"><?php echo e($reservasiPending); ?></h3>
                </div>
            </div>
        </div>

        <!-- MENUNGGU VERIFIKASI PEMBAYARAN -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-credit-card fa-2x text-info mb-2"></i>
                    <h6 class="text-muted">Menunggu Verifikasi</h6>
                    <h3 class="mb-0"><?php echo e($menungguVerifikasi); ?></h3>
                </div>
            </div>
        </div>

        <!-- SUDAH DIBAYAR & DIVERIFIKASI -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                    <h6 class="text-muted">Terverifikasi</h6>
                    <h3 class="mb-0"><?php echo e($reservasiTerverifikasi); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- MENU ADMIN -->
    <div class="row">

        <div class="col-md-4 mb-3">
            <a href="/admin/lapangan" class="text-decoration-none text-dark">
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center">
                        <i class="fas fa-table-tennis fa-2x text-success mb-3"></i>
                        <h5>Kelola Lapangan</h5>
                        <p class="text-muted mb-0">
                            Tambah, edit, dan hapus data lapangan
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="/admin/jadwal" class="text-decoration-none text-dark">
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center">
                        <i class="fas fa-clock fa-2x text-warning mb-3"></i>
                        <h5>Kelola Jadwal</h5>
                        <p class="text-muted mb-0">
                            Atur jadwal penggunaan lapangan
                        </p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4 mb-3">
            <a href="<?php echo e(route('admin.verifikasi.index')); ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center">
                        <i class="fas fa-check-double fa-2x text-info mb-3"></i>
                        <h5>Verifikasi Pembayaran</h5>
                        <p class="text-muted mb-0">
                            Verifikasi bukti pembayaran customer
                        </p>
                    </div>
                </div>
            </a>
        </div>

         <div class="col-md-4 mb-3">
            <a href="<?php echo e(route('admin.invoice.index')); ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center">
                        <i class="fas fa-print fa-2x text-primary mb-3"></i>
                        <h5>Cetak Invoice</h5>
                        <p class="text-muted mb-0">
                            Cetak invoice reservasi lunas
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="<?php echo e(route('admin.laporan.index')); ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center">
                        <i class="fas fa-file-invoice-dollar fa-2x text-danger mb-3"></i>
                        <h5>Laporan</h5>
                        <p class="text-muted mb-0">
                            Lihat laporan transaksi dan reservasi
                        </p>
                    </div>
                </div>
            </a>
        </div>


    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>