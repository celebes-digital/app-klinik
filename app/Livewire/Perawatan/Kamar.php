<?php

namespace App\Livewire\Perawatan;

use App\Livewire\Forms\KamarForm;
use App\Models\KamarPerawatan;
use App\Models\RuangPerawatan;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Kamar extends Component
{
    use Toast;
    public KamarForm $form;

    public $id_kamar; 
    public $kelas = [
        [
            'id' => 'Kelas 1',
            'name' => 'Kelas 1'
        ],
        [
            'id' => 'Kelas 2',
            'name' => 'Kelas 2'
        ],
        [
            'id' => 'Kelas 3',
            'name' => 'Kelas 3'
        ],
        [
            'id' => 'VIP',
            'name' => 'Kelas VIP'
        ],
        [
            'id' => 'VVIP',
            'name' => 'Kelas VVIP'
        ],
    ];
    public $status = [
        [
            'id' => 'Occupied',
            'name' => 'Occupied'
        ],
        [
            'id' => 'Unoccupied',
            'name' => 'Unoccupied'
        ],
        [
            'id' => 'Closed',
            'name' => 'Closed'
        ],
        [
            'id' => 'Housekeeping',
            'name' => 'Housekeeping'
        ],
        [
            'id' => 'Isolated',
            'name' => 'Isolated'
        ],
        [
            'id' => 'Contaminated',
            'name' => 'Contaminated'
        ],
    ];
    public $titleForm = "Input Kamar Perawatan";


    #[On('edit-kamar')]
    public function editKamar($id = null)
    {
        $this->titleForm = "Update Kamar Perawatan";
        $this->id_kamar = $id;
        $kamar = $id ? KamarPerawatan::find($id) : '';

        $kamar ? $this->form->setKamar($kamar) : '';
    }

    public function addNew()
    {
        $this->id_kamar = null;
        $this->titleForm = "Input Kamar Perawatan";
        $this->form->setKamar();
    }

    public function save()
    {
        $this->form->store($this->id_kamar);

        $this->success("Data Kamar Telah Disimpan");

        $this->dispatch('save-ruang');
    }

    #[On('save-ruang')]
    public function render()
    {
        $ruang_perawatan = RuangPerawatan::get();

        return view('livewire.perawatan.kamar', [
            'ruang_perawatan' => $ruang_perawatan
        ]);
    }

}
