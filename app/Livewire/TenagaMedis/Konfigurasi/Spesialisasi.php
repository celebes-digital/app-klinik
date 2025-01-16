<?php

namespace App\Livewire\TenagaMedis\Konfigurasi;

use App\Livewire\Forms\SpesialisForm;
use App\Models\Profesi;
use Livewire\Component;
use Mary\Traits\Toast;

class Spesialisasi extends Component
{
    use Toast;
    public SpesialisForm $form;
    public Profesi $profesi;
    
    
    public $gelar;
    public $headers;
    public $perPage = 2;
    
    public function save()
    {
        $this->form->store();

        $this->success('Data Spesialisasi Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.tenaga-medis.konfigurasi.spesialisasi');
    }
}
