<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';
    protected $guarded = [];

    public function penyakit()
    {
        return $this->hasOne(Penyakit::class, 'id', 'penyakit_id');
    }

    public function rules_gejala()
    {
        return $this->belongsToMany(Gejala::class, 'rules_gejala', 'rules_kode', 'gejala_id');
    }
}
