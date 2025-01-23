<?php

namespace App\Livewire\Forms;

use App\Models\ItemPemeriksaan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemPemeriksaanForm extends Form
{
    public ?ItemPemeriksaan $item_pemeriksaan;

    public $id_daftar_pemeriksaan;

    #[Validate('required')]
    public $nama = '';

    public $loinc_display = '';

    public $loinc_code = '';

    public $satuan = '';

    public $harga_dasar = null;

    public $harga_pemeriksaan = null;

    public $note = '';

    public function setItemPemeriksaan(ItemPemeriksaan $item_pemeriksaan)
    {
        $this->item_pemeriksaan = $item_pemeriksaan;

        $this->id_daftar_pemeriksaan = $item_pemeriksaan->id_daftar_pemeriksaan;
        $this->nama                  = $item_pemeriksaan->nama;
        $this->loinc_display         = $item_pemeriksaan->loinc_display;
        $this->loinc_code            = $item_pemeriksaan->loinc_code;
        $this->satuan                = $item_pemeriksaan->satuan;
        $this->harga_dasar           = $item_pemeriksaan->harga_dasar;
        $this->harga_pemeriksaan     = $item_pemeriksaan->harga_pemeriksaan;
        $this->note                  = $item_pemeriksaan->note;
    }

    public function store($id)
    {
        $this->validate();

        if (!$id) {
            ItemPemeriksaan::create($this->all());
        } else {
            $this->item_pemeriksaan->update($this->all());
        }
    }
}
