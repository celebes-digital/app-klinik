<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Models\DetailPasien;
use App\Models\Pasien;
use App\SatuSehat\FHIR\Prerequisites\Patient;
use App\Traits\WilayahIndonesia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Input Data Pasien')]
class Create extends Component
{
    use Toast;
    use WilayahIndonesia;

    public PasienForm $form;

    public $tanggal_format = ['altFormat' => 'm-d-Y'];
    public $modalIbu       = false;
    public $dataAnakIbu    = [];
    public $totalAnakIbu   = '';
    public $id_pasien;
    public $apiSatuSehat = "https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1";
    public $dataAPI;
    public $dataNikIbuAPI;
    public $title = 'Tambah Pasien';
    public $subtitle = '';

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
            'id' => 'Annulled',
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
            'id' => 0,
            'name' => 'Tidak Kembar',
        ],
        [
            'id' => 1,
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

    public function mount($id_pasien = null)
    {
        // Cari data staff berdasarkan ID
        $this->id_pasien = $id_pasien;
        $pasien          = $id_pasien ? Pasien::find($id_pasien) : '';
        $detailPasien    = $id_pasien ? DetailPasien::find($id_pasien) : '';
        
        $this->title    = $id_pasien ? 'Edit Pasien ' . $pasien->nama : 'Tambah Pasien';
        $pasien         ? $this->form->setPasien($pasien) : '';
        $detailPasien   ? $this->form->setDetailPasien($detailPasien) : '';
    }

    public function formattedDate($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i', $date)->format('Y-m-d');
    }

    public function getByNGB()
    {
        if (!$this->form->nama || !$this->form->tgl_lahir || !$this->form->kelamin) {
            $this->warning(
                'Lengkapi data yang diperlukan!',
                'Nama, jenis kelamin, dan tanggal tahir wajib diisi'
            );
            return;
        }

        $patient = new Patient();
        $data = $patient->getNGB($this->form->nama, $this->formattedDate($this->form->tgl_lahir), $this->form->kelamin);

        if ($data['nama'] === '') {
            $this->info('Data pasien tidak ditemukan');

            return;
        } else {
            $this->form->fill($data);
            Log::info('Get By NGB', [$this->form]);
            $this->mount();

            $this->setData();
        }

    }

    public function getByNikIbu()
    {
        if (!$this->form->nik_ibu) {
            $this->warning("Lengkapi data NIK ibu!", "NIK ibu wajib diisi");

            return;
        }

        $this->success("Data ditemukan");

        $patient = new Patient();
        $data    = $patient->getNikIbu($this->form->nik_ibu);
        if ($data['total'] === 0) {
            $this->info('Tidak ada data yang ditemukan', 'Pastikan NIK ibu benar');

            return;
        }
        $this->modalIbu = true;
        $this->dataAnakIbu  = $data ? $data['data'] : '';
        $this->totalAnakIbu = $data ? $data['total'] : '';
        $this->form->fill($data);
    }

    public function selectAnak($id, $name, $birthdate, $kembar)
    {
        // dd($id, $name, $birthdate);
        $this->modalIbu = false;

        $this->success('Data Telah Dipilih.');
        $this->form->no_ihs         = $id;
        $this->form->nama           = $name;
        $this->form->lahir_kembar   = $kembar;
        $this->form->tgl_lahir      = $birthdate;
    }

    public function save()
    {
        $this->form->store($this->id_pasien);

        $this->success('Data Pasien Telah Disimpan.');
    }

    public function render()
    {
        $headers = [
            ['key' => 'id', 'label' => 'ID IHS'],
            ['key' => 'name', 'label' => 'Nama'],
            ['key' => 'birthdate', 'label' => 'Tanggal Lahir'],
            ['key' => 'kembar', 'label' => 'Lahir Kembar'],
            ['key' => 'action', 'label' => 'Action'],
        ];
        return view('livewire.pasien.create', [
            'headers' => $headers 
        ]);
    }
}
