<?php

namespace App\Livewire\TenagaMedis;

use App\Livewire\Forms\TenagaMedisForm;
use App\Models\Profesi;
use App\Models\Spesialisasi;
use App\Models\TenagaMedis;
use App\SatuSehat\FHIR\Prerequisites\Practitioner;
use App\Traits\WilayahIndonesia;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Tambah Tenaga Medis')]

class Create extends Component
{
    use Toast;
    use WilayahIndonesia;

    public TenagaMedisForm $form;
    public $tanggal_format = ['altFormat' => 'Y-m-d'];

    public $dr = '';
    public $sp = '';

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

    public function updatedFormSpesialisasi($key)
    {
        $spesialisasi = Spesialisasi::find($key);
        $profesi      = $spesialisasi ? Profesi::find($spesialisasi->id_profesi) : '';
        $this->dr = $profesi->code ?? '';
        $this->sp = $spesialisasi->code ?? '';
    }

    public function save()
    {
        $this->form->nama = $this->dr . $this->form->nama . $this->sp;
        $this->form->store();

        $this->success('Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.tenaga-medis.create');
    }
}
