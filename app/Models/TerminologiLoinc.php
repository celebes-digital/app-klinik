<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminologiLoinc extends Model
{
    protected $table = "loinc";
    protected $primaryKey = "code";

    protected $fillable = [
        'code',
        'nama_pemeriksaan',
        'display'
    ];

    public $incrementing = false;
    public $timestamps = false;

    public function item_pemeriksaan()
    {
        return $this->belongsTo(ItemPemeriksaan::class, 'code');
    }
}
