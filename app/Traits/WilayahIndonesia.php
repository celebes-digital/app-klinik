<?php

namespace App\Traits;

use App\SatuSehat\Terminologi\KodeWilayah;

trait WilayahIndonesia
{
    protected ?KodeWilayah $kodeWilayah = null;

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function bootWilayahIndonesia()
    {
        $this->kodeWilayah = new KodeWilayah();
    }

    public function mountWilayahIndonesia()
    {
        $res = $this->kodeWilayah->getProvinsi();
        $this->filteredProvinsi = $res;
    }

    public function setDataWilayah($kodeProv, $kodeKab, $kodeKec)
    {
        $this->updatedProvinsi($kodeProv);
        $this->updatedKabupaten($kodeKab);
        $this->updatedKecamatan($kodeKec);
        $this->form->provinsi = $kodeProv;
        $this->form->kabupaten = $kodeKab;
        $this->form->kecamatan = $kodeKec;
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
        $this->filteredKabupaten = $this->kodeWilayah->getKabupaten($value);
        $this->reset('form.kabupaten', 'filteredKecamatan', 'filteredKelurahan');
        $this->filteredKecamatan = [];
        $this->filteredKelurahan = [];
    }

    public function updatedKabupaten($value)
    {
        $this->reset('filteredKecamatan', 'filteredKelurahan');
        $this->filteredKecamatan = $this->kodeWilayah->getKecamatan($value);
        $this->filteredKelurahan = [];
    }

    public function updatedKecamatan($value)
    {
        $this->reset('filteredKelurahan');
        $this->filteredKelurahan = $this->kodeWilayah->getKelurahan($value);
    }
}
