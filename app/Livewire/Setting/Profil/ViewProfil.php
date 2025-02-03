<?php

namespace App\Livewire\Setting\Profil;

use App\Models\DataSatuSehat;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
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
        return view('livewire.setting.profil.view-profil', [
            'satuSehat'     => $this->satuSehat,
            'selectedTab'   => $this->selectedTab,
        ]);
    }
}
