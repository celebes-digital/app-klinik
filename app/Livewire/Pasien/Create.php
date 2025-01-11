<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Models\Pasien as Pasien;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public PasienForm $form;

    public $selectedTab = "input";

    public $apiurl = "https://www.emsifa.com/api-wilayah-indonesia/api";

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function mount()
    {
        $pasien = new Pasien();

        $this->filteredProvinsi = Http::get($this->apiurl . '/provinces.json')->json();
        if ($pasien) {
            $this->form->setPasien($pasien);

            $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$pasien->provinsi}.json")->json();
            $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$pasien->kabupaten}.json")->json();
            $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$pasien->kecamatan}.json")->json();
        }
    }

    public function render()
    {
        return view('livewire.pasien.create');
    }
}
