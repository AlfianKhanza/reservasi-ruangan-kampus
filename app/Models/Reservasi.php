<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'ruangan_id',
        'peminjam_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keperluan'
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class);
    }
}