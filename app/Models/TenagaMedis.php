<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaMedis extends Model
{
    use HasFactory;

    protected $table = 'tenaga_medis';
    protected $primaryKey = 'id_tenaga_medis';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'nik',
        'no_str',
        'alamat',
        'tgl_lahir',
        'kelamin',
        'no_telp',
        'ihs',
    ];
}
