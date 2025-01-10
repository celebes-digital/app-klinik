<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $staff;
    public $headers;
    public $perPage = 5;

    public function render()
    {
        $this->headers = [
            ['key' => 'id_staff',   'label' => '#'],
            ['key' => 'nama',       'label' => 'Nama'],
            ['key' => 'tgl_lahir',  'label' => 'Tgl. Lahir'],
            ['key' => 'nik',        'label' => 'NIK'],
            ['key' => 'kelamin',    'label' => 'Kelamin'],
            ['key' => 'alamat',     'label' => 'Alamat'],
            ['key' => 'no_telp',    'label' => 'No. Telp'],
            ['key' => 'no_str',     'label' => 'No. STR'],
            ['key' => 'ihs',        'label' => 'IHS']
        ];

        return view('livewire.staff.view');
    }
}
