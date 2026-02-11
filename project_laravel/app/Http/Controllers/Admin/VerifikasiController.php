<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class VerifikasiController extends Controller
{
    // LIST INVOICE YANG PERLU DIVERIFIKASI
    public function index()
    {
        $reservasis = ReservasiModel::with(['user', 'lapangan'])
            ->where('status_pembayaran', 'waiting_verification')
            ->where('status', 'pending')
            ->get();

        return view('admin.verifikasi.index', compact('reservasis'));
    }

    // APPROVE PEMBAYARAN
   public function approve($id)
    {
        $reservasi = ReservasiModel::with(['user', 'lapangan'])
            ->findOrFail($id);

        // 1. Update status di database
        $reservasi->update([
            'status_pembayaran' => 'paid',
            'status' => 'paid'
        ]);

        // 2. Generate ulang PDF invoice
        $pdf = Pdf::loadView('invoice.pdf', [
            'reservasi' => $reservasi
        ]);

        // Pastikan folder invoices ada
        $folderPath = public_path('invoices');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $filePath = $folderPath . '/' . $reservasi->invoice_number . '.pdf';

        // Simpan langsung ke public
        file_put_contents($filePath, $pdf->output());

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

}
