<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $table = 'poliklinik';
    public $timestamps = false;

    protected $fillable = [
        'nama_poli',
        'alamat',
        'email',
        'no_telp',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
    ];

    public function tenagaMedis()
    {
        // TODO SESUAIKAN RELASI NYA
        return $this->hasMany(TenagaMedis::class, 'id_poliklinik', 'id');
    }
}
