<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
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
    public $selectedTab = 'umum';

    public $tanggal_format = ['altFormat' => 'm/d/Y'];

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

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
        // dd($this->form);

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
