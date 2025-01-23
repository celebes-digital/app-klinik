<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPemeriksaan extends Model
{
    protected $table = 'item_pemeriksaan';

    protected $primaryKey = 'id_item_pemeriksaan';

    protected $fillable = [
        'id_daftar_pemeriksaan',
        'nama',
        'loinc_display',
        'loinc_code',
        'satuan',
        'harga_dasar',
        'harga_pemeriksaan',
        'note',
    ];
}
