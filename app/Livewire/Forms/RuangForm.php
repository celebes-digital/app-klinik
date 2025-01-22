<?php

namespace App\Livewire\Forms;

use App\Models\RuangPerawatan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RuangForm extends Form
{
    public ?RuangPerawatan $ruangPerawatan;

    #[Validate('required')]
    public $nama = "";

    public function setRuang(RuangPerawatan $ruangPerawatan = null)
    {
        $this->ruangPerawatan = $ruangPerawatan;

        $this->nama = $ruangPerawatan->nama ?? '';
    }

    public function store($id_ruang_perawatan)
    {
        $this->validate();

        if (!$id_ruang_perawatan) {
            RuangPerawatan::create($this->all());
        } else {
            $this->ruangPerawatan->update($this->all());
        }
    }
}
