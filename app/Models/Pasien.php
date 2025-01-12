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
        'hidup',
        'alamat',
        'no_telp',
        'no_bpjs',
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
        'uuid',
    ];
}
