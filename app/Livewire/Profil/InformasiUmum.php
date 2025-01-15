<?php

namespace App\Livewire\Profil;

use App\Models\Profil;
use App\Traits\WilayahIndonesia;
use App\Livewire\Forms\ProfilForm;

use Mary\Traits\Toast;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class InformasiUmum extends Component
{
    use Toast;
    use WilayahIndonesia;
    use WithFileUploads;

    public ProfilForm $form;

    public function mount()
    {
        $profil = Profil::first();

        if ($profil) {
            $this->form->setProfil($profil);

            $this->setDataWilayah(
                $profil->provinsi,
                $profil->kabupaten,
                $profil->kecamatan,
            );
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
                <div>
                    Loading...
                </div>
            HTML;
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
        return view('livewire.profil.informasi-umum');
    }
}
