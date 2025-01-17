<?php

namespace App\Livewire\TenagaMedis;

use App\Models\TenagaMedis;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Title('Tenaga Medis')]
class View extends Component
{
    use Toast;
    use WithPagination;

    public $tenaga_medis;
    public $headers;
    public $perPage = 5;
    
    public function mount()
    {
        // $this->tenaga_medis = TenagaMedis::paginate($this->perPage);
    }

    public function delete($id)
    {
        TenagaMedis::find($id)->delete();

        $this->success('Data poliklinik berhasil dihapus');
        $this->mount();
    }
    
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
