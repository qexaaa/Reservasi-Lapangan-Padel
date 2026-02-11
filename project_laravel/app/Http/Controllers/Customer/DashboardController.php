<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ReservasiModel;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua reservasi milik user yang sedang login
        // + eager loading lapangan (hindari N+1 query)
        $reservasi = ReservasiModel::with(['lapangan'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('customer.dashboard', compact('reservasi'));
    }
}
