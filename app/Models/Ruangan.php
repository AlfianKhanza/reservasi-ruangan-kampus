<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'kapasitas',
        'lokasi',
        'fasilitas'
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}