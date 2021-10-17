<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $guarded = [];

    public function konsultasi()
    {
        return $this->hasOne(Konsultasi::class, 'kode', 'konsultasi_kode');
    }
}
