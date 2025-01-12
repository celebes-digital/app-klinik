<?php

namespace App\Livewire\Profil;

use App\Livewire\Forms\ProfilSatuSehatForm;
use Livewire\Component;
use Mary\Traits\Toast;

class SatuSehat extends Component
{
    use Toast;

    public ProfilSatuSehatForm $form;

    public function mount($satuSehat)
    {
        if ($satuSehat) {
            $this->form->setProfilSatuSehat($satuSehat);
        }
    }

    public function save()
    {
        $this->form->store();

        $this->success('Data berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.profil.satu-sehat');
    }
}
