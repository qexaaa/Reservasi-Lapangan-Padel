<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapanganModel;

class GuestController extends Controller
{
    public function lapangan()
    {
        $lapangans = LapanganModel::all();
        return view('guest.lapangan.index', compact('lapangans'));
    }

    public function showLapangan($id)
    {
        $lapangan = LapanganModel::findOrFail($id);
        return view('guest.lapangan.show', compact('lapangan'));
    }
}
