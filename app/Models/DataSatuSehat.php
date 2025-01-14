<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSatuSehat extends Model
{
    protected $table        = 'data_satu_sehat';
    protected $primaryKey   = 'organization_id';
    protected $keyType      = 'string';
    public $timestamps      = false;

    protected $fillable = ['organization_id', 'client_id', 'client_secret'];
}
