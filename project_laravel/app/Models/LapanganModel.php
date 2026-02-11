<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LapanganModel extends Model
{
    protected $table = 'lapangans';

    protected $fillable = [
        'nama_lapangan',
        'deskripsi',
        'harga',
        'status',
        'gambar'
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalModel::class);
    }

    public function reservasi()
    {
        return $this->hasMany(ReservasiModel::class);
    }
}
