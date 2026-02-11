<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalModel;
use App\Models\LapanganModel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = JadwalModel::with('lapangan')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_mulai', 'asc')
            ->get();

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $lapangan = LapanganModel::orderBy('nama_lapangan')->get();
        return view('admin.jadwal.create', compact('lapangan'));
    }

    // ===============================
    // STORE (ANTI BENTROK)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal'     => 'required|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);
        
        // ===============================
        // CEK STATUS LAPANGAN
        // ===============================
        $lapangan = LapanganModel::findOrFail($request->lapangan_id);

        if ($lapangan->status === 'maintenance') {
            return back()->with(
                'error',
                'Tidak bisa menambahkan jadwal karena lapangan sedang dalam keadaan maintenance.'
            );
        }

        // CEK BENTROK
        $exists = JadwalModel::where('lapangan_id', $request->lapangan_id)
            ->where('tanggal', $request->tanggal)
            ->where(function ($q) use ($request) {
                $q->where('jam_mulai', '<', $request->jam_selesai)
                ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'Jadwal bentrok dengan jadwal yang sudah ada.');
        }

        JadwalModel::create([
            'lapangan_id' => $request->lapangan_id,
            'tanggal'     => $request->tanggal,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal   = JadwalModel::findOrFail($id);
        if (!$jadwal) {
            return redirect()
                ->route('admin.jadwal.index')
                ->with('error', 'Jadwal tidak ditemukan.');
        }
        
        $lapangan = LapanganModel::orderBy('nama_lapangan')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'lapangan'));
    }

    // ===============================
    // UPDATE (ANTI BENTROK)
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal'     => 'required|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);
        
        $lapangan = \App\Models\LapanganModel::where('id', $request->lapangan_id)->firstOrFail();
        
        // ===============================
        // CEK STATUS LAPANGAN
        // ===============================

         if ($lapangan->status === 'maintenance') {
                return back()->with('error', 'Tidak bisa mengubah jadwal karena lapangan sedang maintenance.');
            }

        $jadwal = JadwalModel::findOrFail($id);

        $exists = JadwalModel::where('lapangan_id', $request->lapangan_id)
            ->where('tanggal', $request->tanggal)
            ->where('id', '!=', $id)
            ->where(function ($q) use ($request) {
                $q->where('jam_mulai', '<', $request->jam_selesai)
                ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'Jadwal bentrok dengan jadwal lain.');
        }

        $jadwal->update([
            'lapangan_id' => $request->lapangan_id,
            'tanggal'     => $request->tanggal,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JadwalModel::findOrFail($id)->delete();

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
