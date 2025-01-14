<?php

namespace App\Livewire\Profil;

use App\Models\Profil;
use App\Livewire\Forms\ProfilForm;
use App\Traits\WilayahIndonesia;
use Mary\Traits\Toast;
use Livewire\Component;
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
