<?php

namespace App\Livewire\Pasien;

use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $pasien;
    public $headers;
    public $perPage = 5;

    public function render()
    {
        $this->headers = [
            ['key' => 'id_pasien',          'label' => '#'],
            ['key' => 'nama',               'label' => 'Nama'],
            ['key' => 'tempat_lahir',       'label' => 'Tmp. Lahir'],
            ['key' => 'tgl_lahir',          'label' => 'Tgl. Lahir'],
            ['key' => 'nik',                'label' => 'NIK'],
            ['key' => 'nik_ibu',            'label' => 'NIK Ibu'],
            ['key' => 'kelamin',            'label' => 'Kelamin'],
            ['key' => 'alamat',             'label' => 'Alamat'],
            ['key' => 'no_telp',            'label' => 'No. Telp'],
            ['key' => 'no_bpjs',            'label' => 'No. BPJS'],
            ['key' => 'status_nikah',       'label' => 'Status Nikah'],
            ['key' => 'provinsi',           'label' => 'Provinsi'],
            ['key' => 'kabupaten',          'label' => 'Kabupaten'],
            ['key' => 'kecamatan',          'label' => 'Kecamatan'],
            ['key' => 'kelurahan',          'label' => 'Kelurahan'],
            ['key' => 'rt',                 'label' => 'RT'],
            ['key' => 'rw',                 'label' => 'RW'],
            ['key' => 'kode_pos',           'label' => 'Kode Pos'],
            ['key' => 'email',              'label' => 'Email'],
            ['key' => 'pekerjaan',          'label' => 'Pekerjaan'],
            ['key' => 'pendidikan',         'label' => 'Pendidikan'],
            ['key' => 'kewarganegaraan',    'label' => 'Kewarganegaraan'],
        ];

        return view('livewire.pasien.view');
    }
}
