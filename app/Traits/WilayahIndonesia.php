<?php

namespace App\Traits;

use App\Models\KodeWilayah;
use Illuminate\Support\Facades\Log;

trait WilayahIndonesia
{
    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function mountWilayahIndonesia()
    {
        Log::info('Mounting Wilayah Indonesia');
        $this->filteredProvinsi = $this->getProvinsi();

        if ($this->form->provinsi) {
            $this->filteredKabupaten = $this->getKabupaten($this->form->provinsi);
        }

        if ($this->form->kabupaten) {
            $this->filteredKecamatan = $this->getKecamatan($this->form->kabupaten);
        }

        if ($this->form->kecamatan) {
            $this->filteredKelurahan = $this->getKelurahan($this->form->kecamatan);
        }
    }

    public function updatedWilayahIndonesia($key, $value)
    {
        if ($key == 'form.provinsi')
            $this->updatedProvinsi($value);
        else if ($key == 'form.kabupaten')
            $this->updatedKabupaten($value);
        else if ($key == 'form.kecamatan')
            $this->updatedKecamatan($value);
    }

    public function updatedProvinsi($value)
    {
        $this->filteredKabupaten    = $this->getKabupaten($value);
        $this->reset(['form.kabupaten', 'form.kecamatan', 'form.kelurahan']);
        $this->filteredKecamatan    = [];
        $this->filteredKelurahan    = [];
    }

    public function updatedKabupaten($value)
    {
        $this->filteredKecamatan = $this->getKecamatan($value);
        $this->reset(['form.kecamatan', 'form.kelurahan']);
        $this->filteredKelurahan = [];
    }

    public function updatedKecamatan($value)
    {
        $this->filteredKelurahan = $this->getKelurahan($value);
        $this->reset('form.kelurahan');
    }

    public function getProvinsi()
    {
        return KodeWilayah::select('kode_provinsi', 'nama_provinsi')->distinct()->get()->toArray();
    }

    public function getKabupaten($kodeProvinsi)
    {
        return KodeWilayah::select('kode_kabupaten', 'nama_kabupaten')->where('kode_provinsi', $kodeProvinsi)->distinct()->get()->toArray();
    }

    public function getKecamatan($kodeKabupaten)
    {
        return KodeWilayah::select('kode_kecamatan', 'nama_kecamatan')->where('kode_kabupaten', $kodeKabupaten)->distinct()->get()->toArray();
    }

    public function getKelurahan($kodeKecamatan)
    {
        return KodeWilayah::select('kode_kelurahan', 'nama_kelurahan')->where('kode_kecamatan', $kodeKecamatan)->distinct()->get()->toArray();
    }
}
