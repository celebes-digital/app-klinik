<?php

namespace App\Livewire\TenagaMedis;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Tenaga Medis')]
class View extends Component
{
    use WithPagination;

    public $tenaga_medis;
    public $headers;
    public $perPage = 5;
    
    public function render()
    {
        $this->headers = [
            ['key' => 'id_tenaga_medis',    'label' => '#'],
            ['key' => 'nama',               'label' => 'Nama'],
            ['key' => 'alamat',             'label' => 'Alamat'],
            ['key' => 'no_telp',            'label' => 'No. Telp'],
            ['key' => 'no_str',             'label' => 'No. STR'],
            ['key' => 'ihs',                'label' => 'IHS']
        ];

        return view('livewire.tenaga-medis.view');
    }
}
