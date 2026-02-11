@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-list mr-2"></i>Laporan Reservasi
            </h4>
            <p class="text-muted mb-0">
                Daftar seluruh data reservasi
            </p>
        </div>

        <a href="/admin/dashboard" class="btn btn-secondary">
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
                            <th>Customer</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="reservasiBody">
                        @forelse($reservasi as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->user->name ?? '-' }}</td>
                            <td>{{ $r->lapangan->nama_lapangan ?? '-' }}</td>
                            <td>{{ $r->tanggal }}</td>
                            <td>{{ $r->jam ?? '-' }}</td>
                            <td>
                                @if($r->status == 'paid')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Paid
                                    </span>
                                @elseif($r->status == 'pending')
                                    <span class="badge badge-warning">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        {{ ucfirst($r->status) }}
                                    </span>
                                @endif
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i>
                                Belum ada data reservasi
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

