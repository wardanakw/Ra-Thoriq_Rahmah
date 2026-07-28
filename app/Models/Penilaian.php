<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'murid_id',
        'guru_id',
        'tanggal',
        'agama',
        'jati_diri',
        'steam',
        'hasil_fuzzy',
        'kategori'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'agama' => 'decimal:2',
        'jati_diri' => 'decimal:2',
        'steam' => 'decimal:2',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailPenilaian::class);
    }
}