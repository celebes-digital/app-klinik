<?php

namespace App\Livewire\TenagaMedis;

use App\Livewire\Forms\TenagaMedisForm;
use App\Models\TenagaMedis;
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

    public $apiSatuSehat = "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1";
    public $dataAPI;
    public $tanggal_format = ['altFormat' => 'Y-m-d'];


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
        $nik = $this->form->nik ?? null;

        if (!$nik) {
            $this->error('NIK tidak boleh kosong.');
            return;
        }

        try {
            $headers = [
                'Authorization' => 'Bearer Z3GfQFF03SF7KdrZ4AH1OV9g6Xps',
                'Accept' => 'application/json',
            ];

            $response = Http::withHeaders($headers)
                ->get($this->apiSatuSehat . "/Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|" . $nik);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['entry'][0]['resource'])) {
                    $resource = $data['entry'][0]['resource'];

                    // Map data to form fields
                    $this->form->no_str     = $resource['id'] ?? null;
                    $this->form->ihs        = $resource['qualification'][0]['identifier'][0]['value'] ?? null;
                    $this->form->alamat     = $resource['address'][0]['line'][0] ?? null;
                    $this->form->kelamin    = $resource['gender'] ?? null;
                    $this->form->tgl_lahir  = $resource['birthDate'] ?? null;
                } else {
                    $this->error('Data tidak ditemukan pada API.');
                }
            } else {
                $this->error('Gagal mengambil data dari API.');
            }
        } catch (\Exception $e) {
            $this->error('Terjadi kesalahan saat memproses data.');
        }
    }

    public function save()
    {
        $this->form->store();

        $this->success('Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.tenaga-medis.create');
    }
}
