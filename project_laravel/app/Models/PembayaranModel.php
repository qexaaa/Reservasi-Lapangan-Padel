<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayarans'; // KUNCI UTAMA

    protected $fillable = [
        'reservasi_id',
        'bukti_pembayaran',
        'tanggal_bayar',
        'total',
    ];
}
