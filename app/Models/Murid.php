<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';

    protected $fillable = [
        'foto',
        'nis',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kelas',
        'nama_orangtua',
        'alamat'
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    
}