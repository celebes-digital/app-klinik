<?php

namespace App\Livewire\Profil;

use App\Livewire\Forms\ProfilSatuSehatForm;

use Mary\Traits\Toast;
use Livewire\Component;

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
        $this->dispatch('set-data-profil');
    }

    public function render()
    {
        return view('livewire.profil.satu-sehat');
    }
}
