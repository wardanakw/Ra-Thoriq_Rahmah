<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{

    protected $fillable=[

'murid_id',

'guru_id',

'tanggal',

'agama',

'jati_diri',

'literasi',

'hasil_fuzzy',

'kategori'

];
   public function murid()
{
    return $this->belongsTo(Murid::class);
}

public function guru()
{
    return $this->belongsTo(User::class,'guru_id');
}

public function detail()
{
    return $this->hasMany(DetailPenilaian::class);
}
}