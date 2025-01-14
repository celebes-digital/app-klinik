<?php

namespace App\Livewire\Forms;

use App\Models\PenunjangMedis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PenunjangMedisForm extends Form
{
    public ?PenunjangMedis $penunjangMedis = null;

    #[Validate('required|size:8|unique:penunjang_medis,kode_penunjang')]
    public $kode_penunjang;

    #[Validate('required')]
    public $nama_penunjang;

    public function setPenunjangMedis(string $id)
    {
        $this->penunjangMedis = PenunjangMedis::where('kode_penunjang', $id)->first();

        $this->kode_penunjang = $this->penunjangMedis->kode_penunjang;
        $this->nama_penunjang = $this->penunjangMedis->nama_penunjang;
    }

    public function store()
    {
        $this->validate();

        if ($this->penunjangMedis) {
            $this->penunjangMedis->update($this->all());
        } else {
            PenunjangMedis::create($this->all());
            $this->reset();
        }
    }

    public function delete(string $id)
    {
        PenunjangMedis::where('kode_penunjang', $id)->delete();
    }
}
