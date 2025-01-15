<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPasien extends Model
{
    use HasFactory;

    protected $table = 'detail_pasien';

    protected $primaryKey = 'id_detail_pasien';

    protected $fillable = [
        'id_pasien',
        'no_telp',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'kode_pos',
        'email',
        'pekerjaan',
        'pendidikan',
        'kewarganegaraan',
        'status_nikah',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
}
