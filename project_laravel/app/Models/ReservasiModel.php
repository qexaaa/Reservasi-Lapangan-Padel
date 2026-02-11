<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservasiModel extends Model
{
    protected $table = 'reservasis';

    protected $fillable = [
        'user_id',
        'lapangan_id',
        'jadwal_id',
        'tanggal',
        'jam',    
        'status',
        'invoice_number',
        'invoice_file',
        'status_pembayaran',
        'total_harga'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalModel::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(LapanganModel::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(PembayaranModel::class);
    }
}
