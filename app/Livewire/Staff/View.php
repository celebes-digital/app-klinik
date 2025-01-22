<?php

namespace App\Livewire\Staff;

use App\Livewire\Forms\StaffForm;
use App\Models\Staff;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class View extends Component
{
    use Toast;
    use WithPagination;

    public $headers;
    public $perPage = 5;

    public function delete($id)
    {
        Staff::find($id)->delete();

        $this->success('Data poliklinik berhasil dihapus');
        $this->mount();
    }
    
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
