<?php

namespace App\Livewire\TenagaMedis\Konfigurasi;

use App\Livewire\Forms\ProfesiForm;
use Livewire\Component;
use Mary\Traits\Toast;

class Profesi extends Component
{
    use Toast;
    public ProfesiForm $form;

    public $gelar;
    public $headers;
    public $perPage = 2;

    public function save()
    {
        $this->form->store();

        $this->success('Data Profesi Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.tenaga-medis.konfigurasi.profesi');
    }
}
