@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-file-invoice-dollar mr-2"></i>Laporan Transaksi
            </h4>
            <p class="text-muted mb-0">
                Daftar transaksi pembayaran yang telah diverifikasi
            </p>
        </div>

        <a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
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
                            <th>ID Reservasi</th>
                            <th>Customer</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="transaksiBody">
                        @forelse($transaksi as $index => $t)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $t->id }}</td>
                            <td>{{ $t->user->name ?? '-' }}</td>
                            <td>{{ $t->lapangan->nama_lapangan ?? '-' }}</td>
                            <td>{{ $t->tanggal }}</td>
                            <td>{{ $t->jam }}</td>
                            <td>
                                <span class="badge badge-success">
                                    <i class="fas fa-check-circle"></i> Paid
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i>
                                Belum ada transaksi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection


{{-- SCRIPT SEARCH JQUERY --}}
@section('scripts')
<script>
$(document).ready(function () {

    // 📄 DATATABLES (PAGINATION ONLY)
    $('#datatable').DataTable({
        searching: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            zeroRecords: "Data tidak ditemukan",
            search:"Cari:",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });
});
</script>
@endsection
