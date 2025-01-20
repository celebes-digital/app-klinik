<?php

namespace App\Livewire\Pasien;

use App\Models\Pasien;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Pasien')]
class View extends Component
{
    use WithPagination;

    public $headers;
    public $perPage = 5;

    public function render()
    {
        $this->headers = [
            ['key' => 'id_pasien',    'label' => '#'],
            ['key' => 'nama',         'label' => 'Nama'],
            ['key' => 'tempat_lahir', 'label' => 'Tempat. Lahir'],
            ['key' => 'tgl_lahir',    'label' => 'Tgl. Lahir'],
            ['key' => 'kelamin',      'label' => 'Kelamin'],
            ['key' => 'nik',          'label' => 'NIK'],
            ['key' => 'nik_ibu',      'label' => 'NIK Ibu'],
            ['key' => 'no_bpjs',      'label' => 'No. BPJS'],
        ];

        $pasien = Pasien::paginate($this->perPage);

        return view('livewire.pasien.view', [
            'pasien' => $pasien
        ]);
    }
}
