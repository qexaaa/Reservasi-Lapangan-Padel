<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;
use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function form($id)
    {
        // Ambil data reservasi + relasi
        $reservasi = ReservasiModel::with(['user', 'lapangan'])
            ->findOrFail($id);

        // CEGAH AKSES JIKA SUDAH DIBAYAR
        if ($reservasi->status_pembayaran === 'paid') {
            return redirect('/customer/dashboard')
                ->with('info', 'Reservasi ini sudah dibayar.');
        }

         // AUTO-OPEN INVOICE
        $autoOpenInvoice = false;

        // GENERATE INVOICE JIKA BELUM ADA
        if (empty($reservasi->invoice_number)) {

            // Invoice number unik
            $invoiceNumber = 'INV-' . date('Y') . '-' .
                str_pad($reservasi->id, 5, '0', STR_PAD_LEFT);

            // Generate PDF
            $pdf = Pdf::loadView('invoice.pdf', [
                'reservasi' => $reservasi
            ]);

            // Simpan ke storage
            $folderPath = public_path('invoices');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $fileName = $invoiceNumber . '.pdf';
            $filePath = $folderPath . '/' . $fileName;

            // Simpan langsung ke public
            file_put_contents($filePath, $pdf->output());

            $path = 'invoices/' . $fileName;

            // Simpan ke database
            $reservasi->update([
                'invoice_number'     => $invoiceNumber,
                'invoice_file'       => $path,
                'status_pembayaran'  => 'unpaid'
            ]);

            // AUTO-OPEN INVOICE
            $autoOpenInvoice = true;

        }

        // Tampilkan form upload invoice
        return view('customer.pembayaran.form', [
            'id' => $reservasi->id,
            'reservasi' => $reservasi
        ]);
    }

    public function upload(Request $request)
    {

        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'bukti'        => 'required|file|mimes:pdf|max:2048',
        ]);

        $reservasi = ReservasiModel::findOrFail($request->reservasi_id);

        if ($reservasi->status_pembayaran !== 'unpaid') {
            return back()->with('error', 'Pembayaran sudah diproses.');
        }

        $file = $request->file('bukti');

        $folderPath = public_path('bukti_pembayaran');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->move($folderPath, $fileName);

        $path = 'bukti_pembayaran/' . $fileName;


        // INSERT KE TABEL PEMBAYARANS
        PembayaranModel::create([
            'reservasi_id'    => $request->reservasi_id,
            'bukti_pembayaran'=> $path,
            'tanggal_bayar'   => now(),
            'total'           => ReservasiModel::find($request->reservasi_id)->total_harga,
        ]);

        // UPDATE STATUS RESERVASI
        ReservasiModel::where('id', $request->reservasi_id)
            ->update([
                'status_pembayaran' => 'waiting_verification',
                'status'            => 'pending'
            ]);
            return back()->with('success', 'Bukti pembayaran berhasil diupload');
    }

}
