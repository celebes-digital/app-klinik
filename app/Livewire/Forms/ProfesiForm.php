<?php

namespace App\Livewire\Forms;

use App\Models\Profesi;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfesiForm extends Form
{
    public ?Profesi $profesi;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $code = "";

    public function setProfesi(Profesi $profesi = null)
    {
        $this->profesi = $profesi;

        $this->nama = $profesi->nama ?? '';
        $this->code = $profesi->code ?? '';
    }

    public function store($id = null)
    {
        $this->validate();

        if (!$id) {
            profesi::create($this->all());
        } else {
            $this->profesi->update($this->all());
        }
    }
}
