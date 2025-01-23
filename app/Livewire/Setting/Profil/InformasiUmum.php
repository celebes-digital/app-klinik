<?php

namespace App\Livewire\Setting\Profil;

use App\Models\Profil;
use App\Livewire\Forms\ProfilForm;
use App\Traits\WilayahIndonesia;
use Illuminate\Support\Facades\Log;
use Mary\Traits\Toast;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class InformasiUmum extends Component
{
    use Toast;
    use WithFileUploads;
    use WilayahIndonesia;

    public ProfilForm $form;

    public function mount()
    {
        Log::info('Mounting Informasi Umum');
        $profil = Profil::first();

        if ($profil) {
            $this->form->setProfil($profil);
        }
    }

    public function placeholder()
    {
        return view('livewire.setting.profil.placeholder', ['type' => 'informasi-umum']);
    }

    #[On('set-data-profil')]
    public function setDataProfile()
    {
        $profil = Profil::first();
        $this->form->setProfil($profil);
        $this->success('Data profil berhasil diatur.');
    }

    public function save()
    {
        $this->form->store();
        $this->success('Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.setting.profil.informasi-umum');
    }
}
