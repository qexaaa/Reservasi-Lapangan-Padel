<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // opsional tapi aman

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * RELASI
     * User memiliki banyak reservasi
     */
    public function reservasi()
    {
        return $this->hasMany(ReservasiModel::class);
    }
}
