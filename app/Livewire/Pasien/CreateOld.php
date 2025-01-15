<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\DetailPasienForm;
use App\Livewire\Forms\PasienForm;
use App\Models\DetailPasien;
use App\Models\Pasien;
use App\Traits\WilayahIndonesia;
use Carbon\Carbon;
use Carbon\Doctrine\CarbonTypeConverter;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Tambah Pasien')]
class CreateOld extends Component
{
    use Toast;
    use WilayahIndonesia;

    public PasienForm $form;
    public DetailPasienForm $formDetail;

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
            $this->form->nama    = $resource['name'][0]['text'] ?? '';
            $this->form->nik     = $resource['identifier'][0]['value'] ?? '';
            $this->form->kelamin = $resource['gender'] ?? '';
            $this->formDetail->kewarganegaraan  = $resource['extension'][0]['valueCode'] ?? '';
            $this->formDetail->alamat           = $resource['address'][0]['line'][0] ?? null;
            $this->formDetail->provinsi         = $resourceAlamat[0]['valueCode'] ?? '';
            $this->formDetail->kabupaten        = $resourceAlamat[1]['valueCode'] ?? '';
            $this->formDetail->kecamatan        = $resourceAlamat[2]['valueCode'] ?? '';
            $this->formDetail->kelurahan        = $resourceAlamat[3]['valueCode'] ?? '';
            $this->formDetail->rt               = $resourceAlamat[4]['valueCode'] ?? '';
            $this->formDetail->rw               = $resourceAlamat[5]['valueCode'] ?? '';
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
        // Simpan data pasien
        $savedPasien = $this->form->store();

        // Gunakan id_pasien yang baru dibuat
        $this->formDetail->id_pasien = $savedPasien->id_pasien;

        $this->formDetail->store();

        $this->success('Data Pasien Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.pasien.create-old');
    }
}

// ! NIK AJA
// "entry" => array:1 [▼
//     0 => array:2 [▼
//       "fullUrl" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/P02478375538"
//       "resource" => array:13 [▼
//         "active" => true
//         "address" => array:1 [▼
//           0 => array:4 [▼
//             "country" => "ID"
//             "extension" => array:1 [▼
//               0 => array:2 [▼
//                 "extension" => array:4 [▼
//                   0 => array:2 [▼
//                     "url" => "province"
//                     "valueCode" => "81"
//                   ]
//                   1 => array:2 [▼
//                     "url" => "city"
//                     "valueCode" => "8102"
//                   ]
//                   2 => array:2 [▼
//                     "url" => "district"
//                     "valueCode" => "810201"
//                   ]
//                   3 => array:2 [▼
//                     "url" => "village"
//                     "valueCode" => "8102012017"
//                   ]
//                 ]
//                 "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode"
//               ]
//             ]
//             "line" => array:1 [▼
//               0 => "JALAN PIN***"
//             ]
//             "use" => "home"
//           ]
//         ]
//         "birthDate" => "1992-01-09"
//         "communication" => array:1 [▶]
//         "deceasedBoolean" => true
//         "extension" => array:1 [▶]
//         "gender" => "male"
//         "id" => "P02478375538"
//         "identifier" => array:2 [▼
//           0 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/nik"
//             "use" => "official"
//             "value" => "################"
//           ]
//           1 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/ihs-number"
//             "use" => "official"
//             "value" => "P02478375538"
//           ]
//         ]
//         "meta" => array:2 [▼
//           "lastUpdated" => "2025-01-03T04:05:08.300173+00:00"
//           "versionId" => "MTczNTg3NzEwODMwMDE3MzAwMA"
//         ]
//         "multipleBirthInteger" => 0
//         "name" => array:1 [▼
//           0 => array:2 [▼
//             "text" => "ARDIANTO PUTRA"
//             "use" => "official"
//           ]
//         ]
//         "resourceType" => "Patient"
//       ]
//     ]
//   ]
//   "link" => array:3 [▼
//     0 => array:2 [▶]
//     1 => array:2 [▶]
//     2 => array:2 [▶]
//   ]
//   "resourceType" => "Bundle"
//   "total" => 1
//   "type" => "searchset"
// ]
// ! NIK IBU
// array:5 [▼ // app\Livewire\Pasien\Create.php:138
//   "entry" => array:12 [▼
//     0 => array:2 [▼
//       "fullUrl" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/P20395049704"
//       "resource" => array:8 [▼
//         "active" => true
//         "birthDate" => "2024-11-30"
//         "id" => "P20395049704"
//         "identifier" => array:2 [▼
//           0 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/nik-ibu"
//             "use" => "official"
//             "value" => "9104025209000006"
//           ]
//           1 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/ihs-number"
//             "use" => "official"
//             "value" => "P20395049704"
//           ]
//         ]
//         "meta" => array:3 [▼
//           "lastUpdated" => "2025-01-06T11:00:07.491097+00:00"
//           "profile" => array:1 [▼
//             0 => "https://fhir.kemkes.go.id/r4/StructureDefinition/Patient"
//           ]
//           "versionId" => "MTczNjE2MTIwNzQ5MTA5NzAwMA"
//         ]
//         "multipleBirthInteger" => 0
//         "name" => array:1 [▼
//           0 => array:2 [▼
//             "text" => "SINTIA AJA"
//             "use" => "official"
//           ]
//         ]
//         "resourceType" => "Patient"
//       ]
//     ]
//     1 => array:2 [▶]
//     2 => array:2 [▶]
//     3 => array:2 [▶]
//     4 => array:2 [▶]
//     5 => array:2 [▶]
//     6 => array:2 [▶]
//     7 => array:2 [▶]
//     8 => array:2 [▶]
//     9 => array:2 [▶]
//     10 => array:2 [▶]
//     11 => array:2 [▶]
//   ]
//   "link" => array:3 [▼
//     0 => array:2 [▼
//       "relation" => "search"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik-ibu%7C9104025209000006"
//     ]
//     1 => array:2 [▼
//       "relation" => "first"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik-ibu%7C9104025209000006"
//     ]
//     2 => array:2 [▼
//       "relation" => "self"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik-ibu%7C9104025209000006"
//     ]
//   ]
//   "resourceType" => "Bundle"
//   "total" => 12
//   "type" => "searchset"
// ]