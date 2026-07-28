<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikators';

    protected $fillable=[

        'kode',

        'elemen',

        'indikator',

        'urutan'

    ];
public function detail()
{
    return $this->hasMany(DetailPenilaian::class);
}
}