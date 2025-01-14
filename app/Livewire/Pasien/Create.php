<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\DetailPasienForm;
use App\Livewire\Forms\PasienForm;
use App\Models\DetailPasien;
use App\Models\Pasien;
use App\Traits\HandlesWilayah;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use HandlesWilayah;
    use Toast;

    public PasienForm $form;
    public DetailPasienForm $formDetail;

    public $tanggal_format = ['altFormat' => 'm/d/Y'];

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

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function getByNik()
    {
        $nik = $this->form->nik ?? null;
        if (!$nik) {
            $this->error('NIK tidak boleh kosong.');

            return;
        }

        $headers = [
            'Authorization' => 'Bearer KmNU8Eizvo4tHtdxYBr1m9hCoCA5',
            'Accept' => 'application/json',
        ];

        $this->dataAPI = Http::withHeaders($headers)
            ->get($this->apiSatuSehat . "/Patient?identifier=https://fhir.kemkes.go.id/id/nik|" . $nik)
            ->json();


        if ($this->dataAPI) {
            $this->form->nama = $this->dataAPI['entry'][0]['resource']['name'][0]['text'];
            // dd($this->form->nama);
        } else {
            session()->flash('error', 'Name not found in the API response.');
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
            'Authorization' => 'Bearer KmNU8Eizvo4tHtdxYBr1m9hCoCA5',
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

    public function mount()
    {
        $this->filteredProvinsi = Http::get("{$this->apiurl}/provinces.json")->json();
    }

    public function updatedFormProvinsi($value)
    {
        $this->filteredKabupaten = $this->loadKabupaten($value);
        $this->filteredKecamatan = [];
        $this->filteredKelurahan = [];
    }

    public function updatedFormKabupaten($value)
    {
        $this->filteredKecamatan = $this->loadKecamatan($value);
        $this->filteredKelurahan = [];
    }

    public function updatedFormKecamatan($value)
    {
        $this->filteredKelurahan = $this->loadKelurahan($value);
    }

    public function save()
    {
        $this->form->store();
        $this->formDetail->store();

        $this->success('Data Pasien Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.pasien.create', [
            'filteredProvinsi'  => $this->filteredProvinsi,
            'filteredKabupaten' => $this->filteredKabupaten,
            'filteredKecamatan' => $this->filteredKecamatan,
            'filteredKelurahan' => $this->filteredKelurahan,
        ]);
    }
}

// ! NIK AJA
// array:5 [▼ // app\Livewire\Pasien\Create.php:112
//   "entry" => array:1 [▼
//     0 => array:2 [▼
//       "fullUrl" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/P02280547535"
//       "resource" => array:7 [▼
//         "active" => true
//         "id" => "P02280547535"
//         "identifier" => array:2 [▼
//           0 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/ihs-number"
//             "use" => "official"
//             "value" => "P02280547535"
//           ]
//           1 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/nik"
//             "use" => "official"
//             "value" => "################"
//           ]
//         ]
//         "link" => array:9 [▼
//           0 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/f2aea232-a5ad-4754-9bb5-10083ce346d3"
//             ]
//             "type" => "refer"
//           ]
//           1 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/46d399d9-e188-42ea-864e-beb3b8ce0f2a"
//             ]
//             "type" => "refer"
//           ]
//           2 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/70e842ae-4428-45bf-9166-dfa17de41e14"
//             ]
//             "type" => "refer"
//           ]
//           3 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/1f346d42-17c2-4d71-9ef0-1b85296f1aba"
//             ]
//             "type" => "refer"
//           ]
//           4 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/04be1530-de1f-4d22-bf5c-ab4bffde2b36"
//             ]
//             "type" => "refer"
//           ]
//           5 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/227a963f-a2e6-4251-b2cf-bb5d292a58de"
//             ]
//             "type" => "refer"
//           ]
//           6 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/f9406b4a-e9b9-4d9a-a421-227cf0b16ab6"
//             ]
//             "type" => "refer"
//           ]
//           7 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/99f9f5af-bf05-4505-99d8-c137e93c2180"
//             ]
//             "type" => "refer"
//           ]
//           8 => array:2 [▼
//             "other" => array:1 [▼
//               "reference" => "RelatedPerson/dd6c8273-e5ea-4455-a78c-6657cf669b4b"
//             ]
//             "type" => "refer"
//           ]
//         ]
//         "meta" => array:2 [▼
//           "lastUpdated" => "2025-01-06T11:00:07.785437+00:00"
//           "versionId" => "MTczNjE2MTIwNzc4NTQzNzAwMA"
//         ]
//         "name" => array:1 [▼
//           0 => array:2 [▼
//             "text" => "Sa** An** Ri**"
//             "use" => "official"
//           ]
//         ]
//         "resourceType" => "Patient"
//       ]
//     ]
//   ]
//   "link" => array:3 [▼
//     0 => array:2 [▼
//       "relation" => "search"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C9104025209000006"
//     ]
//     1 => array:2 [▼
//       "relation" => "first"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C9104025209000006"
//     ]
//     2 => array:2 [▼
//       "relation" => "self"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C9104025209000006"
//     ]
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