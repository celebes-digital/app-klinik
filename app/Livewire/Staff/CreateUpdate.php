<?php

namespace App\Livewire\Staff;

use App\Livewire\Forms\StaffForm;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Tambah Staff')]
class CreateUpdate extends Component
{
    use Toast;
    public StaffForm $form;
    public $tanggal_format = ['al]Format' => 'm/d/Y'];

    public $apiSatuSehat = "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1";

    public $dataAPI;

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
    public function save()
    {
        $this->form->store();

        $this->success('Data Staff Telah Disimpan.');
    }

    public function render()
    {
        return view('livewire.staff.create-update');
    }
}

//       "entry" => array:1 [▼
//     0 => array:2 [▼
//       "fullUrl" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Practitioner/10006926841"
//       "resource" => array:9 [▼
//         "address" => array:1 [▼
//           0 => array:5 [▼
//             "city" => "Kab. Garut"
//             "country" => "ID"
//             "extension" => array:1 [▼
//               0 => array:2 [▼
//                 "extension" => array:6 [▼
//                   0 => array:2 [▼
//                     "url" => "province"
//                     "valueCode" => "32"
//                   ]
//                   1 => array:2 [▼
//                     "url" => "city"
//                     "valueCode" => "3205"
//                   ]
//                   2 => array:2 [▼
//                     "url" => "district"
//                     "valueCode" => "320519"
//                   ]
//                   3 => array:2 [▼
//                     "url" => "village"
//                     "valueCode" => "3205192003"
//                   ]
//                   4 => array:2 [▼
//                     "url" => "rw"
//                     "valueCode" => "1"
//                   ]
//                   5 => array:2 [▼
//                     "url" => "rt"
//                     "valueCode" => "12"
//                   ]
//                 ]
//                 "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode"
//               ]
//             ]
//             "line" => array:1 [▼
//               0 => "Komplek Kesehatan"
//             ]
//             "use" => "home"
//           ]
//         ]
//         "birthDate" => "1995-02-02"
//         "gender" => "male"
//         "id" => "10006926841"
//         "identifier" => array:2 [▼
//           0 => array:2 [▼
//             "system" => "https://fhir.kemkes.go.id/id/nakes-his-number"
//             "value" => "10006926841"
//           ]
//           1 => array:3 [▼
//             "system" => "https://fhir.kemkes.go.id/id/nik"
//             "use" => "official"
//             "value" => "3322071302900002"
//           ]
//         ]
//         "meta" => array:2 [▼
//           "lastUpdated" => "2024-11-05T09:10:51.313514+00:00"
//           "versionId" => "MTczMDc5Nzg1MTMxMzUxNDAwMA"
//         ]
//         "name" => array:1 [▼
//           0 => array:2 [▼
//             "text" => "d** Yo** Ya** S**"
//             "use" => "official"
//           ]
//         ]
//         "qualification" => array:1 [▼
//           0 => array:2 [▼
//             "code" => array:1 [▼
//               "coding" => array:1 [▼
//                 0 => array:3 [▼
//                   "code" => "STR-KKI"
//                   "display" => "Surat Tanda Registrasi Dokter"
//                   "system" => "https://terminology.kemkes.go.id/v1-0302"
//                 ]
//               ]
//             ]
//             "identifier" => array:1 [▼
//               0 => array:2 [▼
//                 "system" => "https://fhir.kemkes.go.id/id/str-kki-number"
//                 "value" => "1234567887654322"
//               ]
//             ]
//           ]
//         ]
//         "resourceType" => "Practitioner"
//       ]
//     ]
//   ]
//   "link" => array:3 [▼
//     0 => array:2 [▼
//       "relation" => "search"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Practitioner/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C3322071302900002"
//     ]
//     1 => array:2 [▼
//       "relation" => "first"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Practitioner/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C3322071302900002"
//     ]
//     2 => array:2 [▼
//       "relation" => "self"
//       "url" => "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Practitioner/?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C3322071302900002"
//     ]
//   ]
//   "resourceType" => "Bundle"
//   "total" => 1
//   "type" => "searchset"
// ]