<?php

namespace App\Livewire\Forms;

use App\Models\DaftarPemeriksaan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DaftarPemeriksaanForm extends Form
{
    public ?DaftarPemeriksaan $daftarPemeriksaan;

    public $kode_penunjang = "";

    #[Validate('required')]
    public $nama = "";

    public $keterangan = "";

    public function setDaftarPemeriksaan(DaftarPemeriksaan $daftarPemeriksaan = null)
    {
        $this->daftarPemeriksaan = $daftarPemeriksaan;

        $this->nama = $daftarPemeriksaan->nama ?? '';
        $this->keterangan = $daftarPemeriksaan->keterangan ?? '';
    }

    public function store($id)
    {
        $this->validate();

        if (!$id) {
            DaftarPemeriksaan::create($this->all());
        } else {
            $this->daftarPemeriksaan->update($this->all());
        }
    }
}
