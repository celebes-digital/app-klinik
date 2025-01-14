<?php

namespace App\Livewire\Forms;

use App\Models\DataSatuSehat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfilSatuSehatForm extends Form
{
    public ?DataSatuSehat $satuSehat = null;

    #[Validate('required')]
    public $organization_id = "";

    #[Validate('required')]
    public $client_id       = "";

    #[Validate('required')]
    public $client_secret   = "";

    public function setProfilSatuSehat(DataSatuSehat $dataSatuSehat)
    {
        $this->satuSehat = $dataSatuSehat;

        $this->organization_id = $dataSatuSehat->organization_id;
        $this->client_id       = $dataSatuSehat->client_id;
        $this->client_secret   = $dataSatuSehat->client_secret;
    }

    public function store()
    {
        $this->validate();

        if ($this->satuSehat) {
            $this->satuSehat->update($this->all());
        } else {
            DataSatuSehat::create($this->all());
        }
    }
}
