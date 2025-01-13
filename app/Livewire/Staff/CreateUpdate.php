<?php

namespace App\Livewire\Staff;

use App\Livewire\Forms\StaffForm;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateUpdate extends Component
{
    use Toast;

    public StaffForm $form;
    public $tanggal_format = ['al]Format' => 'm/d/Y'];

    public $kelamin = [
        [
            'id' => '',
            'name' => 'Pilih Jenis Kelamin',
        ],
        [
            'id' => 'male',
            'name' => 'Laki-laki',
        ],
        [
            'id' => 'female',
            'name' => 'Perempuan'
        ]
    ];

    public function save()
    {
        $this->form->store();

        $this->success('Data Staff Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.staff.create-update');
    }
}
