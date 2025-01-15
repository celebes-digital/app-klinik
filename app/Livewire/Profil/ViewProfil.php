<?php

namespace App\Livewire\Profil;

use App\Models\DataSatuSehat;
use Livewire\Component;

class ViewProfil extends Component
{
    public $selectedTab = 'umum';
    public ?DataSatuSehat $satuSehat;

    public function mount()
    {
        $this->satuSehat = DataSatuSehat::first();

        if (!$this->satuSehat) {
            $this->selectedTab = 'satu-sehat';
        }
    }

    public function render()
    {
        return view('livewire.profil.view-profil', [
            'satuSehat'     => $this->satuSehat,
            'selectedTab'   => $this->selectedTab,
        ]);
    }
}
