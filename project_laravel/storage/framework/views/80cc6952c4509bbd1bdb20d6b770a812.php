

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-clock mr-2"></i>Data Jadwal
        </h4>

        <div>
            <a href="/admin/dashboard" class="btn btn-secondary mr-2">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="/admin/jadwal/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Jadwal
            </a>
        </div>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="jadwalBody">
                        <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e(optional($j->lapangan)->nama_lapangan ?? '-'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($j->tanggal)->format('d M Y')); ?></td>
                            <td><?php echo e($j->jam_mulai); ?></td>
                            <td><?php echo e($j->jam_selesai); ?></td>

                            <td>
                                <a href="<?php echo e(route('admin.jadwal.edit', $j->id)); ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="<?php echo e(route('admin.jadwal.destroy', $j->id)); ?>"
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
                                <i class="fas fa-info-circle"></i>
                                Data jadwal belum tersedia
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
        searching: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            zeroRecords: "Data tidak ditemukan",
            search: "Cari:",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        },
        columnDefs: [
            { orderable: false, targets: [5] } // kolom Aksi
        ]
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/jadwal/index.blade.php ENDPATH**/ ?>