@extends('layouts.app')

@section('content')
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
                        @foreach($reservasi as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $r->lapangan->nama_lapangan }}</td>

                            <td>
                                {{-- STATUS RESERVASI --}}
                                @if($r->status == 'pending')
                                    <span class="badge badge-warning">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                @elseif($r->status == 'paid')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Paid
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        {{ ucfirst($r->status) }}
                                    </span>
                                @endif

                                {{-- STATUS PEMBAYARAN --}}
                                @if(isset($r->status_pembayaran))
                                    <br>
                                    @if($r->status_pembayaran == 'unpaid')
                                        <span class="badge badge-danger mt-1">
                                            Belum Dibayar
                                        </span>
                                    @elseif($r->status_pembayaran == 'waiting_verification')
                                        <span class="badge badge-info mt-1">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($r->status_pembayaran == 'paid')
                                        <span class="badge badge-success mt-1">
                                            Sudah Dibayar
                                        </span>
                                    @endif
                                @endif
                            </td>

                            <td>
                                {{-- PREVIEW GAMBAR LAPANGAN --}}
                                <button
                                    class="btn btn-sm btn-secondary mb-1"
                                    data-toggle="modal"
                                    data-target="#lapanganModal"
                                    data-nama="{{ $r->lapangan->nama_lapangan }}"
                                    data-gambar="{{ \App\Helpers\StorageHelper::url($r->lapangan->gambar) }}"
                                    title="Lihat Lapangan">
                                    <i class="fas fa-image"></i>
                                </button>

                                {{-- DOWNLOAD INVOICE --}}
                                @if(!empty($r->invoice_file))
                                    <a href="{{ route('customer.invoice.download', $r->id) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-info mb-1"
                                       title="Download Invoice">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>
                                @endif

                                {{-- BAYAR --}}
                                @if($r->status == 'pending' && $r->status_pembayaran == 'unpaid')
                                    <a href="/customer/pembayaran/{{ $r->id }}"
                                       class="btn btn-sm btn-success mb-1"
                                       title="Bayar">
                                        <i class="fas fa-credit-card"></i>
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
@endsection

@section('scripts')
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
@endsection
