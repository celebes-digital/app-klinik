<?php

namespace App\Livewire\Forms;

use App\Models\Spesialisasi;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SpesialisForm extends Form
{
    public ?Spesialisasi $spesialisasi;

    #[Validate('required')]
    public $id_profesi = "";

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $code = "";

    public function setSpesialisasi(Spesialisasi $spesialisasi = null)
    {
        $this->spesialisasi = $spesialisasi;

        $this->id_profesi   = $spesialisasi->id_profesi ?? '';
        $this->nama         = $spesialisasi->nama ?? '';
        $this->code         = $spesialisasi->code ?? '';
    }

    public function store($id = null)
    {
        $this->validate();

        if (!$id) {
            spesialisasi::create($this->all());
        } else {
            $this->spesialisasi->update($this->all());
        }
    }
}
