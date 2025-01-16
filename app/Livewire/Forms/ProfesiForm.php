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

    public function setProfesi(Profesi $profesi)
    {
        $this->profesi = $profesi;

        $this->nama = $profesi->nama;
        $this->code = $profesi->code;
    }

    public function store()
    {
        $this->validate();

        Profesi::create($this->all());
    }
}
