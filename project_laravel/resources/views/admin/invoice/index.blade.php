@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-print mr-2 text-primary"></i>
                Cetak Invoice
            </h4>
            <p class="text-muted mb-0">
                Daftar reservasi lunas yang dapat dicetak invoice-nya
            </p>
        </div>

        <a href="/admin/dashboard" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover mb-0" id="datatable-invoice">
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
                        @foreach($reservasis as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="badge badge-success">
                                    {{ $r->invoice_number }}
                                </span>
                            </td>
                            <td>{{ $r->tanggal }}</td>
                            <td>{{ $r->user->name ?? '-' }}</td>
                            <td>{{ $r->lapangan->nama_lapangan ?? '-' }}</td>
                            <td>
                                Rp{{ number_format($r->total_harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.invoice.print', $r->id) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-print"></i> Cetak
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#datatable-invoice').DataTable({
        pageLength: 10,
        language: {
            zeroRecords: "Tidak ada data invoice",
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
             paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });
});
</script>
@endsection
