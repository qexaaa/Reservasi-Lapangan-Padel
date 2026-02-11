

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-file-invoice mr-2"></i>Upload Invoice Pembayaran
            </h4>
            <p class="text-muted mb-0">
                Silakan upload invoice resmi yang diterbitkan oleh sistem
            </p>
        </div>

        <a href="/customer/dashboard" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

           <form method="POST"
                action="<?php echo e(route('customer.pembayaran.upload')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="reservasi_id" value="<?php echo e($reservasi->id); ?>">

                <!-- BUKTI PEMBAYARAN (INVOICE PDF) -->
                <div class="form-group">
                    <label>Invoice Pembayaran (PDF)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-file-pdf text-danger"></i>
                            </span>
                        </div>
                        <input
                            type="file"
                            name="bukti"
                            class="form-control"
                            accept="application/pdf"
                            required
                        >
                    </div>
                    <small class="text-muted">
                        Hanya file PDF invoice resmi. Maksimal 2MB.
                    </small>
                </div>

                <!-- TOTAL BAYAR (READONLY) -->
                <div class="form-group">
                    <label>Total Bayar (Rp)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-money-bill-wave"></i>
                            </span>
                        </div>
                        <input
                            type="text"
                            class="form-control"
                            value="Sesuai invoice"
                            readonly
                        >
                    </div>
                    <small class="text-muted">
                        Total pembayaran mengikuti invoice yang diterbitkan sistem
                    </small>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane"></i> Upload Invoice
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


<?php if(isset($autoOpenInvoice) && $autoOpenInvoice && !empty($reservasi->invoice_file)): ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        window.open("<?php echo e(asset($reservasi->invoice_file)); ?>", "_blank");
    }, 300);
});
</script>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/customer/pembayaran/form.blade.php ENDPATH**/ ?>