<?php

namespace App\Livewire\Staff;

use App\Livewire\Forms\StaffForm;
use App\Models\Staff;
use App\SatuSehat\FHIR\Prerequisites\Practitioner;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Tambah Staff')]
class CreateUpdate extends Component
{
    use Toast;
    public StaffForm $form;
    public $tanggal_format = ['al]Format' => 'm/d/Y'];
    public $id_staff;

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

    public function getByNik()
    {
        $practitioner = new Practitioner();
        $data         = $practitioner->get($this->form->nik ?? null);
        $this->form->fill($data);
    }

    public function mount($id_staff = null)
    {
        // Cari data staff berdasarkan ID
        $this->id_staff = $id_staff;
        $staff = $id_staff ? Staff::find($id_staff) : '';

        $staff ? $this->form->setStaff($staff) : '';
    }


    public function save()
    {
        $this->form->store($this->id_staff);

        $this->success('Data Staff Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.staff.create-update');
    }
}