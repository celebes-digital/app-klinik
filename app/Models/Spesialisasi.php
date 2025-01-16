<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialisasi extends Model
{
    /** @use HasFactory<\Database\Factories\SpesialisasiFactory> */
    use HasFactory;

    protected $table = 'spesialisasi';
    protected $primaryKey = 'id_spesialisasi';

    protected $fillable = [
        'id_profesi',
        'nama',
        'code',
    ];

    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'id_profesi');
    }
}
