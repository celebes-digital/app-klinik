<?php

namespace App\Livewire\Forms;

use App\Models\Poliklinik;
use App\Models\Profil;

use Livewire\Form;
use Livewire\Attributes\Validate;

class PoliForm extends Form
{
    public ?Poliklinik $poli = null;

    #[Validate('required')]
    public $nama_poli       = "";

    public $tarif_dasar     = 0;

    public $tarif_konsultasi = 0;

    public $alamat          = "";

    public $email           = "";

    public $no_telp         = "";

    public $provinsi        = null;

    public $kabupaten       = null;

    public $kecamatan       = null;

    public $kelurahan       = null;

    public $kode_pos        = "";


    public function setDataPoli(Poliklinik $poli)
    {
        $this->poli = $poli;

        $this->fill(
            $poli->only(['nama_poli', 'tarif_dasar', 'tarif_konsultasi'])
        );
    }

    public function setDetailPoli($poli)
    {
        $this->poli = $poli;
        $this->fill($poli->except(['tarif_dasar', 'tarif_konsultasi']));
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nama_poli'             => $this->nama_poli,
            'tarif_dasar'           => str_replace('.', '', $this->tarif_dasar),
            'tarif_konsultasi'      => str_replace('.', '', $this->tarif_konsultasi),
        ];

        if (!$this->poli) {
            Poliklinik::create($data);
        } else {
            $this->poli->update($data);
        }
    }

    public function updateDetailPoli()
    {
        $this->poli->update($this->only([
            'alamat',
            'email',
            'no_telp',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'kode_pos',
        ]));
    }
}
