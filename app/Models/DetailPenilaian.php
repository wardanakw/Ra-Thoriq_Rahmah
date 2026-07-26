<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    protected $fillable = [
        'penilaian_id',
        'indikator_id',
        'nilai'
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}