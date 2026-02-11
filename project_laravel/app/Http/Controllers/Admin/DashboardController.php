<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;

class DashboardController extends Controller
{
    public function index()
    {   
        // Mengambil jumlah seluruh data reservasi yang ada di database
        // Digunakan sebagai informasi ringkasan (summary) pada dashboard admin
        $totalReservasi = ReservasiModel::count();

        // 1. Reservasi baru, belum bayar
        $reservasiPending = ReservasiModel::where('status', 'pending')
            ->where('status_pembayaran', 'unpaid')
            ->count();

        // 2. Sudah upload bukti, menunggu verifikasi staff
        $menungguVerifikasi = ReservasiModel::where('status', 'pending')
            ->where('status_pembayaran', 'waiting_verification')
            ->count();

        // 3. Sudah dibayar & diverifikasi
        $reservasiTerverifikasi = ReservasiModel::where('status', 'paid')
            ->where('status_pembayaran', 'paid')
            ->count();

        // Mengirim data total reservasi ke view admin.dashboard
        return view('admin.dashboard', compact(
            'totalReservasi',
            'reservasiPending',
            'menungguVerifikasi',
            'reservasiTerverifikasi'
        ));
    }
}
