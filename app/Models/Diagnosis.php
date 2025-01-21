<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table        = 'diagnosis';
    protected $primaryKey   = 'no_kunjungan';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    public $casts = [
        'diagnosis'         => 'array',
        'diagnosis_banding' => 'array'
    ];

    public $fillable = [
        'no_kunjungan',
        'diagnosis',
        'diagnosis_banding'
    ];
}
