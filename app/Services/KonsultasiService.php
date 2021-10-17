<?php

namespace App\Services;

use App\Models\Gejala;
use App\Models\Rules;

class KonsultasiService
{
    public function kalkulasi(array $id_gejala)
    {
        return Gejala::with('rules_gejala')->whereIn('id', $id_gejala)->get()->pluck('rules_gejala')->flatten()->unique('kode');
    }
}
