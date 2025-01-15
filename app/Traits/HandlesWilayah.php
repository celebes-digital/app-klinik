<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait HandlesWilayah
{
	public $apiurl = "https://www.emsifa.com/api-wilayah-indonesia/api";

	public function loadKabupaten($provinsiId)
	{
		return Http::get("{$this->apiurl}/regencies/{$provinsiId}.json")->json();
	}

	public function loadKecamatan($kabupatenId)
	{
		return Http::get("{$this->apiurl}/districts/{$kabupatenId}.json")->json();
	}

	public function loadKelurahan($kecamatanId)
	{
		return Http::get("{$this->apiurl}/villages/{$kecamatanId}.json")->json();
	}
}
