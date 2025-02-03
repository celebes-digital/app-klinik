<?php

namespace App\Livewire\Forms;

use App\Models\TindakanMedis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TindakanMedisForm extends Form
{
    public ?TindakanMedis $tindakanMedis = null;

    #[Validate('required|size:8|unique:tindakan_medis,kode_tindakan')]
    public $kode_tindakan = '';

    #[Validate('required')]
    public $nama_tindakan = '';

    #[Validate('required')]
    public $id_poliklinik = '';

    #[Validate('required|numeric')]
    public $harga_satuan = 0;

    #[Validate('required|numeric')]
    public $harga_dasar = 0;

    public function setTindakanMedis(string $id)
    {
        $this->tindakanMedis = TindakanMedis::where('kode_tindakan', $id)->first();

        $this->fill($this->tindakanMedis);
    }

    public function store()
    {
        $this->validate();

        $data = [
            'kode_tindakan' => $this->kode_tindakan,
            'nama_tindakan' => $this->nama_tindakan,
            'id_poliklinik' => $this->id_poliklinik,
            'harga_satuan'  => str_replace('.', '', $this->harga_satuan),
            'harga_dasar'   => str_replace('.', '', $this->harga_dasar),
        ];

        if ($this->tindakanMedis) {
            $this->tindakanMedis->update($data);
        } else {
            TindakanMedis::create($data);
            $this->reset();
        }
    }
}
