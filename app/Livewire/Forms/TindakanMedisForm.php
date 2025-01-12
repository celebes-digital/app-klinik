<?php

namespace App\Livewire\Forms;

use App\Models\TindakanMedis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TindakanMedisForm extends Form
{
    public ?TindakanMedis $tindakanMedis = null;

    #[Validate('required|size:8|unique:tindakan_medis,kode_tindakan')]
    public $kode_tindakan;

    #[Validate('required')]
    public $nama_tindakan;

    #[Validate('required|numeric')]
    public $harga_satuan;

    #[Validate('required|numeric')]
    public $harga_dasar;

    public function setTindakanMedis(string $id)
    {
        $this->tindakanMedis = TindakanMedis::where('kode_tindakan', $id)->first();

        $this->fill($this->tindakanMedis);
    }

    public function store()
    {
        $this->validate();

        if ($this->tindakanMedis) {
            $this->tindakanMedis->update($this->all());
        } else {
            TindakanMedis::create($this->all());
            $this->reset();
        }
    }

    public function delete(string $id)
    {
        TindakanMedis::where('kode_tindakan', $id)->delete();
    }
}
