<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'id_staff',
        'nama',
        'tgl_lahir',
        'nik',
        'kelamin',
        'alamat',
        'no_telp',
        'no_str',
        'ihs',
    ];
}
