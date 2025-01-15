<?php

namespace App\Livewire\Forms;

use App\Models\Poliklinik;
use App\Models\Profil;

use App\Traits\WilayahIndonesia;

use Livewire\Form;
use Livewire\Attributes\Validate;

class PoliForm extends Form
{
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

        $this->fill($poli);
    }

    public function setLokasiPuskesmas()
    {
        $dataLokasi = Profil::first();

        if ($dataLokasi) {
            $this->fill($dataLokasi);
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
