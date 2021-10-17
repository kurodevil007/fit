<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'gejala';

    public function rules_gejala()
    {
        return $this->belongsToMany(Rules::class, 'rules_gejala', 'gejala_id', 'rules_kode');
    }
}
