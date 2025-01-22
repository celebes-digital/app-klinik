<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD9CM extends Model
{
    protected $table        = 'icd9cm';
    protected $primaryKey   = 'code';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable     = ['code', 'display'];
}
