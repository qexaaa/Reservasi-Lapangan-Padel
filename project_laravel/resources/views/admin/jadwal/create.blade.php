@extends('layouts.app')

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-calendar-plus mr-2"></i>Tambah Jadwal
        </h4>

        <a href="/admin/jadwal" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST" action="/admin/jadwal">
                @csrf

                <!-- LAPANGAN -->
                <div class="form-group">
                    <label>Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-table-tennis"></i>
                            </span>
                        </div>
                       <select name="lapangan_id" class="form-control" required>
                        <option value="">-- Pilih Lapangan --</option>
                        @foreach ($lapangan as $lp)
                            <option value="{{ $lp->id }}">
                                {{ $lp->nama_lapangan }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-day"></i>
                            </span>
                        </div>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>

                <!-- JAM MULAI -->
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>
                </div>

                <!-- JAM SELESAI -->
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
