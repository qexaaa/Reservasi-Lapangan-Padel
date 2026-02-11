<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'lapangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai'
    ];

    public function lapangan()
    {
        return $this->belongsTo(LapanganModel::class);
    }

    public function reservasi()
    {
        return $this->hasMany(ReservasiModel::class, 'jadwal_id');
    }

}
