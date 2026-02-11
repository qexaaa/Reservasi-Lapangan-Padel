@extends('layouts.app')

@section('content')
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
                action="{{ route('customer.pembayaran.upload') }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="reservasi_id" value="{{ $reservasi->id }}">

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

{{-- Auto Open Invoice setelah Ter-Generate --}}
@if(isset($autoOpenInvoice) && $autoOpenInvoice && !empty($reservasi->invoice_file))
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        window.open("{{ asset($reservasi->invoice_file) }}", "_blank");
    }, 300);
});
</script>
@endif


@endsection
