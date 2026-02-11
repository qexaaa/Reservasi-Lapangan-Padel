@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-edit mr-2"></i>Edit Jadwal
        </h4>

        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.jadwal.update', $jadwal->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <!-- LAPANGAN (READ ONLY / OPTIONAL SELECT) -->
                <div class="form-group">
                    <label>Lapangan</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $jadwal->lapangan->nama_lapangan }}"
                           readonly>
                    
                    <input type="hidden"
                            name="lapangan_id"
                            value="{{ $jadwal->lapangan_id }}">

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ $jadwal->tanggal }}"
                           required>
                </div>

                <!-- JAM MULAI -->
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <input type="time"
                           name="jam_mulai"
                           class="form-control"
                           value="{{ $jadwal->jam_mulai }}"
                           required>
                </div>

                <!-- JAM SELESAI -->
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time"
                           name="jam_selesai"
                           class="form-control"
                           value="{{ $jadwal->jam_selesai }}"
                           required>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Jadwal
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
