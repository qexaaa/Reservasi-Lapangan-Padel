<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;

class LaporanController extends Controller
{

  public function index()
    {
        // TOTAL SEMUA RESERVASI
        $totalReservasi = ReservasiModel::count();

        // TOTAL TRANSAKSI (HANYA YANG SUDAH PAID)
        $totalTransaksi = ReservasiModel::where('status_pembayaran', 'paid')
            ->sum('total_harga');

        return view('admin.laporan.index', compact(
            'totalReservasi',
            'totalTransaksi'
        ));
    }
    
public function transaksi()
    {
        $transaksi = \App\Models\ReservasiModel::with(['user', 'lapangan'])
            ->where('status_pembayaran', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.laporan.transaksi', compact('transaksi'));
    }


public function reservasi()
    {
        $reservasi = ReservasiModel::with(['user','lapangan'])->get();

        return view('admin.laporan.reservasi', compact('reservasi')); // DETAIL reservasi
    }

}
