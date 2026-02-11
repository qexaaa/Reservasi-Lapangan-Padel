

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-table-tennis mr-2"></i>Data Lapangan
        </h4>

        <div>
            <a href="/admin/dashboard" class="btn btn-secondary mr-2">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="/admin/lapangan/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Lapangan
            </a>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover mb-0" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Lapangan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $lapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>

                          
                            <td>
                                <?php if($l->gambar): ?>
                                    <div class="text-center">
                                        <a href="<?php echo e(\App\Helpers\StorageHelper::url($l->gambar)); ?>" target="_blank">
                                            <img
                                                src="<?php echo e(\App\Helpers\StorageHelper::url($l->gambar)); ?>"
                                                alt="Gambar <?php echo e($l->nama_lapangan); ?>"
                                                class="img-fluid rounded mb-1"
                                                style="width: 140px; height: 100px; object-fit: cover;"
                                            >
                                        </a>
                                        <div class="small text-muted">
                                            <?php echo e($l->nama_lapangan); ?>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>

                            <td><?php echo e($l->nama_lapangan); ?></td>

                            <td>
                                Rp<?php echo e(number_format($l->harga, 0, ',', '.')); ?>

                            </td>

                            <td>
                                <?php if($l->status == 'aktif'): ?>
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-times-circle"></i> Maintenance
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="/admin/lapangan/<?php echo e($l->id); ?>/edit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                            <form action="<?php echo e(route('admin.lapangan.destroy', $l->id)); ?>"
                                method="POST"
                                class="d-inline delete-form">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> Data lapangan belum tersedia
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function () {
    $('#datatable').DataTable({
        pageLength: 5,          // MULAI DARI 5 DATA
        lengthMenu: [5, 10, 25, 50], // pilihan jumlah data
        
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            zeroRecords: "Data tidak ditemukan",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        },
        columnDefs: [
            { orderable: false, targets: [1, 5] }
        ]
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/lapangan/index.blade.php ENDPATH**/ ?>