<?php

namespace App\Livewire\Forms;

use App\Models\Pasien as Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    public ?Pasien $pasien;

    #[Validate('required')]
    public $nama   = "";

    public function setPasien(Pasien $pasien)
    {
        $this->pasien = $pasien;

        $this->nama  = $pasien->nama;
    }
}
