<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;

trait WilayahIndonesia
{
    public $apiurl = "https://www.emsifa.com/api-wilayah-indonesia/api";

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    #[Validate('required')]
    public $provinsi        = null;

    #[Validate('required')]
    public $kabupaten       = null;

    #[Validate('required')]
    public $kecamatan       = null;

    #[Validate('required')]
    public $kelurahan       = null;

    public function mountWilayahIndonesia()
    {
        $this->filteredProvinsi = Http::get($this->apiurl . '/provinces.json')->json();
    }

    public function setDataWilayah($kodeProv, $kodeKab, $kodeKec)
    {
        $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$kodeProv}.json")->json();
        $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$kodeKab}.json")->json();
        $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$kodeKec}.json")->json();
    }

    public function updatedWilayahIndonesia($key, $value)
    {
        if ($key == 'provinsi' || $key == 'form.provinsi')
            $this->updatedProvinsi($value);
        else if ($key == 'kabupaten' || $key == 'form.kabupaten')
            $this->updatedKabupaten($value);
        else if ($key == 'kecamatan' || $key == 'form.kecamatan')
            $this->updatedKecamatan($value);
    }

    public function updatedProvinsi($value)
    {
        $this->kabupaten = null;
        $this->kecamatan = null;
        $this->kelurahan = null;
        $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$value}.json")->json();
        $this->filteredKecamatan = [];
        $this->filteredKelurahan = [];
    }

    public function updatedKabupaten($value)
    {
        $this->kecamatan = null;
        $this->kelurahan = null;
        $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$value}.json")->json();
        $this->filteredKelurahan = [];
    }

    public function updatedKecamatan($value)
    {
        $this->kelurahan = null;
        $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$value}.json")->json();
    }
}
