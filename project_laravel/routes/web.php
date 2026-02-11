<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Response;

// CONTROLLER ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\InvoiceController;

// CONTROLLER CUSTOMER
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\ReservasiController;
use App\Http\Controllers\Customer\PembayaranController;

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN & REGISTER)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing_page');
});

// GUEST LAPANGAN
Route::get('/lapangan', [GuestController::class, 'lapangan'])->name('guest.lapangan');
Route::get('/lapangan/{id}', [GuestController::class, 'showLapangan'])->name('guest.lapangan.show');

//LOGIN
Route::get('/login', [AuthController::class,'loginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

//REGISTER
Route::get('/register', [AuthController::class,'registerForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);

//LOGOUT
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

// SERVE FILE DARI STORAGE (UNTUK GAMBAR LAPANGAN)
// Route untuk Storage::url() format /storage/{path} - catch semua file di public/storage
Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);

    // Cegah directory traversal
    if (!str_starts_with(realpath($fullPath), realpath(storage_path('app/public')))) {
        abort(403);
    }

    abort_unless(file_exists($fullPath), 404);

    return response()->file($fullPath);
})->where('path', '.*');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    // ADMIN DASHBOARD
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    // VERIFIKASI PEMBAYARAN
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('admin.verifikasi.index');
    Route::post('/verifikasi/{id}', [VerifikasiController::class, 'approve'])->name('admin.verifikasi.approve');

    // CETAK INVOICE
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::get('/invoice/{id}/print', [InvoiceController::class, 'print'])->name('admin.invoice.print');

    // LAPANGAN INDEX
    Route::get('/lapangan', [LapanganController::class, 'index'])
        ->name('admin.lapangan.index');

    // LAPANGAN CREATE
    Route::get('/lapangan/create', [LapanganController::class, 'create'])
        ->name('admin.lapangan.create');

    // LAPANGAN STORE
    Route::post('/lapangan', [LapanganController::class, 'store'])
        ->name('admin.lapangan.store');

    // LAPANGAN EDIT
    Route::get('/lapangan/{id}/edit', [LapanganController::class, 'edit'])
        ->name('admin.lapangan.edit');

    // LAPANGAN UPDATE
    Route::put('/lapangan/{id}', [LapanganController::class, 'update'])
        ->name('admin.lapangan.update');

    // LAPANGAN DESTROY
    Route::delete('/lapangan/{id}', [LapanganController::class, 'destroy'])
        ->name('admin.lapangan.destroy');

    // DASHBOARD LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');

    // LAPORAN TRANSAKSI
    Route::get('/laporan/transaksi', [LaporanController::class, 'transaksi'])->name('admin.laporan.transaksi');

    // LAPORAN RESERVASI
    Route::get('/laporan/reservasi', [LaporanController::class, 'reservasi'])->name('admin.laporan.reservasi');

    // JADWAL INDEX
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal.index');

    // JADWAL CREATE (FORM)
    Route::get('/jadwal/create', [JadwalController::class, 'create'])
        ->name('admin.jadwal.create');

    // JADWAL STORE (SUBMIT)
    Route::post('/jadwal', [JadwalController::class, 'store'])
        ->name('admin.jadwal.store');

    // UPDATE JADWAL
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');

    // EDIT JADWAL
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');

    // DELETE JADWAL
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');

});

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:customer'])->prefix('customer')->group(function () {

        // CUSTOMER DASHBOARD
        Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('customer.dashboard');

        // RESERVASI
        Route::get('/reservasi', [ReservasiController::class, 'index'])
            ->name('customer.reservasi');

        Route::post('/reservasi', [ReservasiController::class, 'store'])
            ->name('customer.reservasi.store');

        // PEMBAYARAN
        Route::get('/pembayaran/{id}', [PembayaranController::class, 'form'])
            ->name('customer.pembayaran.form');

        Route::post('/pembayaran/upload', [PembayaranController::class, 'upload'])
            ->name('customer.pembayaran.upload');

        // DOWNLOAD INVOICE
        Route::get('/invoice/{id}/download', [ReservasiController::class, 'downloadInvoice'])
            ->name('customer.invoice.download');
});