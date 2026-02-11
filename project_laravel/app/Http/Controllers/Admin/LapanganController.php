<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LapanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = LapanganModel::orderBy('created_at', 'desc')->get();
        return view('admin.lapangan.index', compact('lapangan'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    // ========================
    // STORE
    // ========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'status' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        // BERSIHKAN HARGA: HAPUS TITIK DARI FORMAT RIBUAN
        $harga = str_replace(['Rp', '.', ' '], '', $request->harga);
    
        // PASTI FILE ADA
        $gambar = $request->file('gambar');
    
        // BUAT NAMA FILE UNIK
        $originalName = pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $gambar->getClientOriginalExtension();
    
        // BERSIHKAN NAMA FILE DARI KARAKTER ANEH (SPASI, KURUNG, DLL)
        $cleanName = preg_replace('/[^A-Za-z0-9\-]/', '_', $originalName);
    
        $namaFile = time() . '_' . $cleanName . '.' . $extension;
    
        // PASTIKAN FOLDER ADA
        if (!file_exists(public_path('lapangan'))) {
            mkdir(public_path('lapangan'), 0755, true);
        }
    
        // SIMPAN FILE
        $gambar->move(public_path('lapangan'), $namaFile);
    
        // SIMPAN DB DENGAN HARGA YANG SUDAH DI-CLEAN
        LapanganModel::create([
            'nama_lapangan' => $request->nama_lapangan,
            'deskripsi' => $request->deskripsi,
            'harga' => $harga,
            'status' => $request->status,
            'gambar' => 'lapangan/' . $namaFile
        ]);
    
        return redirect('/admin/lapangan')
            ->with('success', 'Lapangan berhasil ditambahkan');
    }


    public function edit($id)
    {
        $lapangan = LapanganModel::findOrFail($id);
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    // ========================
    // UPDATE
    // ========================
    public function update(Request $request, $id)
    {
        $lapangan = LapanganModel::findOrFail($id);

        $request->validate([
            'nama_lapangan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'status' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // CLEAN HARGA
        $harga = str_replace(['Rp', '.', ' '], '', $request->harga);

        // OPTIONAL: pastikan numeric
        if (!is_numeric($harga)) {
            return back()->with('error', 'Format harga tidak valid');
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
        
            if ($lapangan->gambar && file_exists(public_path($lapangan->gambar))) {
                unlink(public_path($lapangan->gambar));
            }
        
            $gambar = $request->file('gambar');
        
            $originalName = pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $gambar->getClientOriginalExtension();
        
            // BERSIHKAN NAMA FILE DARI KARAKTER ANEH
            $cleanName = preg_replace('/[^A-Za-z0-9\-]/', '_', $originalName);
        
            $namaFile = time() . '_' . $cleanName . '.' . $extension;
        
            // PASTIKAN FOLDER ADA
            if (!file_exists(public_path('lapangan'))) {
                mkdir(public_path('lapangan'), 0755, true);
            }
        
            $request->file('gambar')->move(public_path('lapangan'), $namaFile);
        
            $lapangan->gambar = 'lapangan/' . $namaFile;
        }

        $lapangan->update([
            'nama_lapangan' => $request->nama_lapangan,
            'deskripsi' => $request->deskripsi,
            'harga' => $harga,
            'status' => $request->status,
        ]);

        return redirect('/admin/lapangan')
            ->with('success', 'Lapangan berhasil diperbarui');
    }


    // ========================
    // DESTROY
    // ========================
    public function destroy($id)
    {
        $lapangan = LapanganModel::findOrFail($id);

        if ($lapangan->gambar && file_exists(public_path($lapangan->gambar))) {
            unlink(public_path($lapangan->gambar));
        }

        $lapangan->delete();

        return back()->with('success', 'Lapangan berhasil dihapus');
    }
}
