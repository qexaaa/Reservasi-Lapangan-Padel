<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-check-circle mr-2 text-success"></i>
                Verifikasi Pembayaran
            </h4>
            <p class="text-muted mb-0">
                Daftar reservasi yang menunggu verifikasi pembayaran
            </p>
        </div>

        <a href="/admin/dashboard" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FLASH -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle mr-1"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover mb-0" id="datatable-verifikasi">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Lapangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reservasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <span class="badge badge-info">
                                    <?php echo e($r->invoice_number); ?>

                                </span>
                            </td>
                            <td><?php echo e($r->tanggal); ?></td>
                            <td><?php echo e($r->user->name ?? '-'); ?></td>
                            <td><?php echo e($r->lapangan->nama_lapangan ?? '-'); ?></td>
                            <td>
                                Rp<?php echo e(number_format($r->total_harga, 0, ',', '.')); ?>

                            </td>
                            <td>
                                <?php if($r->invoice_file): ?>
                                    <a href="<?php echo e(asset($r->invoice_file)); ?>"
                                       target="_blank"
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-file-pdf"></i> Lihat Bukti
                                    </a>
                                <?php endif; ?>

                                <form method="POST"
                                      action="<?php echo e(route('admin.verifikasi.approve', $r->id)); ?>"
                                      class="d-inline approve-form">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {
    $('#datatable-verifikasi').DataTable({
        pageLength: 5,
        language: {
            zeroRecords: "Tidak ada reservasi menunggu verifikasi",
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        },
        columnDefs: [
            { orderable: false, targets: [6] }
        ]
    });

    // SWEET ALERT UNTUK APPROVE PEMBAYARAN
    document.querySelectorAll('.approve-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Setujui Pembayaran?',
                text: 'Pembayaran akan dikonfirmasi dan invoice akan diperbarui',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/admin/verifikasi/index.blade.php ENDPATH**/ ?>