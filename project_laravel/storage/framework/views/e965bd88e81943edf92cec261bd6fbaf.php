

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-user mr-2"></i>Dashboard Customer
        </h4>

        <a href="/customer/reservasi" class="btn btn-primary">
            <i class="fas fa-calendar-plus"></i> Reservasi Lapangan
        </a>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h5 class="mb-3">
                <i class="fas fa-list mr-2"></i>Riwayat Reservasi
            </h5>

            <div class="table-responsive">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Lapangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reservasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>

                            <td><?php echo e($r->lapangan->nama_lapangan); ?></td>

                            <td>
                                
                                <?php if($r->status == 'pending'): ?>
                                    <span class="badge badge-warning">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                <?php elseif($r->status == 'paid'): ?>
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Paid
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">
                                        <?php echo e(ucfirst($r->status)); ?>

                                    </span>
                                <?php endif; ?>

                                
                                <?php if(isset($r->status_pembayaran)): ?>
                                    <br>
                                    <?php if($r->status_pembayaran == 'unpaid'): ?>
                                        <span class="badge badge-danger mt-1">
                                            Belum Dibayar
                                        </span>
                                    <?php elseif($r->status_pembayaran == 'waiting_verification'): ?>
                                        <span class="badge badge-info mt-1">
                                            Menunggu Verifikasi
                                        </span>
                                    <?php elseif($r->status_pembayaran == 'paid'): ?>
                                        <span class="badge badge-success mt-1">
                                            Sudah Dibayar
                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>

                            <td>
                                
                                <button
                                    class="btn btn-sm btn-secondary mb-1"
                                    data-toggle="modal"
                                    data-target="#lapanganModal"
                                    data-nama="<?php echo e($r->lapangan->nama_lapangan); ?>"
                                    data-gambar="<?php echo e(\App\Helpers\StorageHelper::url($r->lapangan->gambar)); ?>"
                                    title="Lihat Lapangan">
                                    <i class="fas fa-image"></i>
                                </button>

                                
                                <?php if(!empty($r->invoice_file)): ?>
                                    <a href="<?php echo e(route('customer.invoice.download', $r->id)); ?>"
                                       target="_blank"
                                       class="btn btn-sm btn-info mb-1"
                                       title="Download Invoice">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>
                                <?php endif; ?>

                                
                                <?php if($r->status == 'pending' && $r->status_pembayaran == 'unpaid'): ?>
                                    <a href="/customer/pembayaran/<?php echo e($r->id); ?>"
                                       class="btn btn-sm btn-success mb-1"
                                       title="Bayar">
                                        <i class="fas fa-credit-card"></i>
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- MODAL PREVIEW LAPANGAN -->
<div class="modal fade" id="lapanganModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalLapanganNama"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body text-center">
                <img id="modalLapanganImage"
                     class="img-fluid rounded"
                     style="max-height:400px;">
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function () {

    // DATATABLE
    $('#datatable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data",
            zeroRecords: "Data tidak ditemukan",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        },
        columnDefs: [
            { orderable: false, targets: [3] }
        ]
    });

    // MODAL PREVIEW GAMBAR
    $('#lapanganModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);

        const nama   = button.data('nama');
        const gambar = button.data('gambar');

        $('#modalLapanganNama').text(nama);
        $('#modalLapanganImage').attr('src', gambar);
    });

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/customer/dashboard.blade.php ENDPATH**/ ?>