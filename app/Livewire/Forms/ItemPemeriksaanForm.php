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
    public $nama_pemeriksaan = '';
    
    public $permintaan_hasil = '';

    public $satuan = '';

    public $code = '';

    public $harga_dasar = null;

    public $harga_pemeriksaan = null;

    public $note = '';

    public function setItemPemeriksaan(ItemPemeriksaan $item_pemeriksaan)
    {
        $this->item_pemeriksaan = $item_pemeriksaan;

        $this->id_daftar_pemeriksaan = $item_pemeriksaan->id_daftar_pemeriksaan;
        $this->nama_pemeriksaan      = $item_pemeriksaan->nama_pemeriksaan;
        $this->code                  = $item_pemeriksaan->code;
        $this->permintaan_hasil      = $item_pemeriksaan->permintaan_hasil;
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
