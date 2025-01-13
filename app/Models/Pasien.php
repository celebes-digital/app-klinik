<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien'; 
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'nik',
        'nik_ibu',
        'kelamin',
        'lahir_kembar',
        'no_bpjs',
        'uuid',
    ];

    public function detailPasien()
    {
        return $this->hasOne(DetailPasien::class, 'id_pasien', 'id_pasien');
    }
}
