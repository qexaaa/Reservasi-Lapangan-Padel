<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\LapanganModel;
use App\Models\ReservasiModel;
use App\Models\JadwalModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

class ReservasiController extends Controller
{
   public function index(Request $request)
    {
        //1. Ambil semua lapangan
        $lapangan = LapanganModel::all();

         /**
         * 2. Ambil jadwal yang:
         * - Sesuai lapangan (jika dipilih)
         * - Sesuai tanggal (jika dipilih)
         * - BELUM pernah direservasi
         */
        $jadwals = JadwalModel::when($request->lapangan_id, function ($query) use ($request) {
                $query->where('lapangan_id', $request->lapangan_id);
            })
            ->when($request->tanggal, function ($query) use ($request) {
                $query->where('tanggal', $request->tanggal);
            })
            ->whereDoesntHave('reservasi', function ($q) use ($request) {
                $q->where('status', '!=', 'cancel')
                  ->where('tanggal', $request->tanggal);
            })
            ->get();

        return view('customer.reservasi.index', compact('lapangan', 'jadwals'));
    }


    public function store(Request $request)
    {
        //1. VALIDASI INPUT DASAR
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'jadwal_id'   => 'required|exists:jadwals,id',
            'tanggal'     => 'required|date',
        ]);

        // ===============================
        // CEK TANGGAL TIDAK BOLEH LAMPAU
        // ===============================
        $tanggalDipilih = Carbon::parse($request->tanggal)->startOfDay();
        $hariIni        = Carbon::today();

        if ($tanggalDipilih->lt($hariIni)) {
            return back()->with(
                'error',
                'Tidak bisa melakukan reservasi pada tanggal yang sudah lewat.'
            );
        }

        //2. Ambil data lapangan
        $lapangan = LapanganModel::findOrFail($request->lapangan_id);

        //3. Ambil jadwal yang HARUS cocok
        $jadwal = JadwalModel::where('id', $request->jadwal_id)
            ->where('lapangan_id', $lapangan->id)
            ->where('tanggal', $request->tanggal)
            ->first();

        if (!$jadwal) {
            return back()->with(
                'error',
                'Lapangan tidak tersedia pada tanggal yang dipilih.'
            );
        }

        // ===============================
        // CEK WAKTU (KHUSUS HARI INI)
        // ===============================
        $now = Carbon::now();

        if ($tanggalDipilih->equalTo($hariIni)) {
            $jamMulaiJadwal = Carbon::parse(
                $request->tanggal . ' ' . $jadwal->jam_mulai
            );

            if ($jamMulaiJadwal->lte($now)) {
                return back()->with(
                    'error',
                    'Jam yang dipilih sudah lewat. Silakan pilih jam lain.'
                );
            }
        }

        //4. CEK STATUS LAPANGAN
        if ($lapangan->status === 'maintenance') {
            return back()->with(
                'error',
                'Lapangan sedang dalam keadaan maintenance.'
            );
        }

        //5. CEK APAKAH JADWAL SUDAH DIBOOKING
        $sudahDipesan = ReservasiModel::where('jadwal_id', $jadwal->id)
            ->where('tanggal', $request->tanggal)
            ->where('status', '!=', 'cancel')
            ->exists();

        if ($sudahDipesan) {
            return back()->with(
                'error',
                'Jadwal yang dipilih sudah dipesan.'
            );
        }

        //6. HITUNG DURASI & TOTAL HARGA
        $jamMulai   = Carbon::parse($jadwal->jam_mulai);
        $jamSelesai = Carbon::parse($jadwal->jam_selesai);
        $durasiJam  = $jamMulai->diffInHours($jamSelesai);

        if ($durasiJam <= 0) {
            return back()->with(
                'error',
                'Durasi jam tidak valid.'
            );
        }

        $totalHarga = $durasiJam * $lapangan->harga;
        $jam = $jadwal->jam_mulai . ' - ' . $jadwal->jam_selesai;

        //7. SIMPAN RESERVASI
        $reservasi = ReservasiModel::create([
            'user_id'           => Auth::id(),
            'lapangan_id'       => $request->lapangan_id,
            'jadwal_id'         => $request->jadwal_id,
            'tanggal'           => $request->tanggal,
            'jam'               => $jam,
            'status'            => 'pending',
            'status_pembayaran' => 'unpaid',
            'total_harga'       => $totalHarga
        ]);

        //8. GENERATE INVOICE
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad($reservasi->id, 5, '0', STR_PAD_LEFT);
        $reservasi->update(['invoice_number' => $invoiceNumber]);

        //9. LOAD RELASI
        $reservasi->load(['lapangan', 'jadwal']);

        //10. GENERATE PDF
        $pdf = Pdf::loadView('invoice.pdf', ['reservasi' => $reservasi]);

        $folderPath = public_path('invoices');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $fileName = $invoiceNumber . '.pdf';
        $filePath = $folderPath . '/' . $fileName;

        // Simpan langsung ke public
        file_put_contents($filePath, $pdf->output());

        $path = 'invoices/' . $fileName;

        $reservasi->update(['invoice_file' => $path]);

        return redirect('/customer/dashboard')
            ->with('success', 'Reservasi berhasil! Invoice telah dibuat.');
    }


    public function downloadInvoice($id)
    {
        $reservasi = ReservasiModel::findOrFail($id);
    
        // NONAKTIFKAN CEK USER SEMENTARA
        // if ($reservasi->user_id !== Auth::id()) {
        //     abort(403);
        // }
    
        if (empty($reservasi->invoice_file)) {
            abort(404);
        }
    
        $filePath = public_path($reservasi->invoice_file);
    
        if (!file_exists($filePath)) {
            abort(404);
        }
    
        return response()->download($filePath);
    }


}
