@extends('layouts.app')

@section('content')
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
                        @forelse($lapangan as $index => $l)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                          {{-- GAMBAR --}}
                            <td>
                                @if($l->gambar)
                                    <div class="text-center">
                                        <a href="{{ \App\Helpers\StorageHelper::url($l->gambar) }}" target="_blank">
                                            <img
                                                src="{{ \App\Helpers\StorageHelper::url($l->gambar) }}"
                                                alt="Gambar {{ $l->nama_lapangan }}"
                                                class="img-fluid rounded mb-1"
                                                style="width: 140px; height: 100px; object-fit: cover;"
                                            >
                                        </a>
                                        <div class="small text-muted">
                                            {{ $l->nama_lapangan }}
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>

                            <td>{{ $l->nama_lapangan }}</td>

                            <td>
                                Rp{{ number_format($l->harga, 0, ',', '.') }}
                            </td>

                            <td>
                                @if($l->status == 'aktif')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-times-circle"></i> Maintenance
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="/admin/lapangan/{{ $l->id }}/edit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                            <form action="{{ route('admin.lapangan.destroy', $l->id) }}"
                                method="POST"
                                class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> Data lapangan belum tersedia
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

@section('scripts')
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
@endsection
