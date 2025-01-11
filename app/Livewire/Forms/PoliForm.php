<?php

namespace App\Livewire\Forms;

use App\Models\Poliklinik;
use App\Models\Profil;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Mary\Traits\Toast;

class PoliForm extends Form
{
    use Toast;

    public ?Poliklinik $poli;

    #[Validate('required')]
    public $nama_poli       = "";

    #[Validate('required')]
    public $alamat          = "";

    #[Validate('required|email')]
    public $email           = "";

    #[Validate('required|numeric|min:9')]
    public $no_telp         = "";

    #[Validate('required')]
    public $provinsi        = null;

    #[Validate('required')]
    public $kabupaten       = null;

    #[Validate('required')]
    public $kecamatan       = null;

    #[Validate('required')]
    public $kelurahan       = null;

    #[Validate('required')]
    public $kode_pos        = "";


    public function setDataPoli(Poliklinik $poli)
    {
        $this->poli = $poli;

        $this->nama_poli       = $poli->nama_poli;
        $this->alamat          = $poli->alamat;
        $this->email           = $poli->email;
        $this->no_telp         = $poli->no_telp;
        $this->provinsi        = $poli->provinsi;
        $this->kabupaten       = $poli->kabupaten;
        $this->kecamatan       = $poli->kecamatan;
        $this->kelurahan       = $poli->kelurahan;
        $this->kode_pos        = $poli->kode_pos;
    }

    public function setLokasiPuskesmas()
    {
        $dataLokasi = Profil::first();

        if ($dataLokasi) {
            $this->alamat          = $dataLokasi->alamat;
            $this->provinsi        = $dataLokasi->provinsi;
            $this->kabupaten       = $dataLokasi->kabupaten;
            $this->kecamatan       = $dataLokasi->kecamatan;
            $this->kelurahan       = $dataLokasi->kelurahan;
            $this->kode_pos        = $dataLokasi->kode_pos;

            return true;
        }

        return false;
    }

    public function store($idPoli)
    {
        $this->validate();

        if (!$idPoli) {
            Poliklinik::create($this->all());
        } else {
            $this->poli->update($this->all());
        }
    }
}
