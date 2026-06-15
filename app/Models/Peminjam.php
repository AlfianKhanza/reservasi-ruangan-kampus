<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'program_studi',
        'nomor_hp'
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}