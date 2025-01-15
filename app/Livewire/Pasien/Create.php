<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Traits\WilayahIndonesia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;
    use WilayahIndonesia;

    public PasienForm $form;

    public $tanggal_format = ['altFormat' => 'm-d-Y'];

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

    public $status_nikah = [
        [
            'id' => '',
            'name' => 'Pilih Status Nikah',
        ],
        [
            'id' => 'Married',
            'name' => 'Menikah',
        ],
        [
            'id' => 'Unmarried',
            'name' => 'Belum Menikah'
        ],
        [
            'id' => 'Divorced',
            'name' => 'Cerai',
        ],
        [
            'id' => 'Widowed',
            'name' => 'Janda/Duda'
        ]
    ];

    public $lahir_kembar = [
        [
            'id' => false,
            'name' => 'Tidak Kembar',
        ],
        [
            'id' => true,
            'name' => 'Kembar'
        ]
    ];

    public $hidup = [
        [
            'id' => true,
            'name' => 'Hidup',
        ],
        [
            'id' => false,
            'name' => 'Meninggal'
        ]
    ];

    public $apiSatuSehat = "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1";

    public $dataAPI;
    public $dataNikIbuAPI;

    public function formattedDate($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i', $date)->format('Y-m-d');
    }

    public function getByNGB()
    {
        $search = $this->form->nama . "&birthdate=" . $this->formattedDate($this->form->tgl_lahir) . "&gender=" . $this->form->kelamin;

        if (!$this->form->nama || !$this->form->tgl_lahir || !$this->form->kelamin) {
            $this->error("Lengkapi Semua Data");

            return;
        }

        $headers = [
            'Authorization' => 'Bearer Z3GfQFF03SF7KdrZ4AH1OV9g6Xps',
            'Accept' => 'application/json',
        ];

        $this->dataAPI = Http::withHeaders($headers)
            ->get($this->apiSatuSehat . "/Patient?name=" . $search)
            ->json();

        if ($this->dataAPI) {
            $resource       = $this->dataAPI['entry'][0]['resource'] ?? '';
            $resourceAlamat = $resource['address'][0]['extension'][0]['extension'] ?? '';

            // dd($this->dataAPI);
            $this->form->nama             = $resource['name'][0]['text'] ?? '';
            $this->form->nik              = $resource['identifier'][0]['value'] ?? '';
            $this->form->kelamin          = $resource['gender'] ?? '';
            $this->form->kewarganegaraan  = $resource['extension'][0]['valueCode'] ?? '';
            $this->form->alamat           = $resource['address'][0]['line'][0] ?? null;
            $this->form->provinsi         = $resourceAlamat[0]['valueCode'] ?? '';
            $this->form->kabupaten        = $resourceAlamat[1]['valueCode'] ?? '';
            $this->form->kecamatan        = $resourceAlamat[2]['valueCode'] ?? '';
            $this->form->kelurahan        = $resourceAlamat[3]['valueCode'] ?? '';
            $this->form->rt               = $resourceAlamat[4]['valueCode'] ?? '';
            $this->form->rw               = $resourceAlamat[5]['valueCode'] ?? '';
        } else {
            session()->flash('error', 'No data found for the given Name.');
        }
    }

    public function getByNikIbu()
    {
        $nik = $this->form->nik_ibu ?? null;
        if (!$nik) {
            $this->error('NIK tidak boleh kosong.');

            return;
        }

        $headers = [
            'Authorization' => 'Bearer Z3GfQFF03SF7KdrZ4AH1OV9g6Xps',
            'Accept' => 'application/json',
        ];

        $this->dataNikIbuAPI = Http::withHeaders($headers)
            ->get($this->apiSatuSehat . "/Patient?identifier=https://fhir.kemkes.go.id/id/nik-ibu|" . $nik)
            ->json();

        if ($this->dataNikIbuAPI) {
            dd($this->dataNikIbuAPI);
        } else {
            session()->flash('error', 'No data found for the given NIK.');
        }
    }

    public function save()
    {
        $this->form->store();

        $this->reset();
        $this->success('Data Pasien Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.pasien.create');
    }
}