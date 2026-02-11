<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        // List only paid reservations
        $reservasis = ReservasiModel::with(['user', 'lapangan'])
            ->where('status_pembayaran', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.invoice.index', compact('reservasis'));
    }

    public function print($id)
    {
        $reservasi = ReservasiModel::with(['user', 'lapangan'])
            ->findOrFail($id);

        if ($reservasi->status_pembayaran !== 'paid') {
            return back()->with('error', 'Invoice belum lunas / tidak tersedia.');
        }

        $pdf = Pdf::loadView('invoice.pdf', [
            'reservasi' => $reservasi
        ]);

        return $pdf->stream('Invoice-' . $reservasi->invoice_number . '.pdf');
    }
}
