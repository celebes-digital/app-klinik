<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokObat extends Model
{
	protected $table		= 'stok_obat';
	protected $primaryKey	= 'id_obat';
	protected $fillable 	= ['id_obat', 'stok'];

	public function obat(): BelongsTo
	{
		return $this->belongsTo(Obat::class, 'id_obat');
	}
}