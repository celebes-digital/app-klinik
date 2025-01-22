<?php

namespace App\Livewire\TenagaMedis\Konfigurasi;

use App\Livewire\Forms\SpesialisForm;
use App\Models\Profesi;
use App\Models\Spesialisasi as ModelsSpesialisasi;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Spesialisasi extends Component
{
    use Toast;
    public SpesialisForm $form;
    public Profesi $profesi;

    public $gelar;
    public $idSpesialisasi;
    public $titleForm = "Input Spesialisasi";
    public $perPage = 2;

    public $modalSpesialisasi = false;
    public $selectedSpesialisasiNama = null;
    public $selectedSpesialisasiId = null;

    public $headers = [
        ['key' => 'no',             'label' => '#'],
        ['key' => 'nama',           'label' => 'Nama'],
        ['key' => 'code',           'label' => 'Code'],
        ['key' => 'profesi.nama',   'label' => 'Profesi'],
        ['key' => 'actions',   'label' => 'Action'],
    ];

    public function openModalSpesialisasi($id, $nama)
    {
        $this->modalSpesialisasi = true;

        $this->selectedSpesialisasiNama = $nama;
        $this->selectedSpesialisasiId = $id;
    }

    public function addNew()
    {
        $this->idSpesialisasi = null;
        $this->titleForm = "Input Spesialisasi";

        $this->form->setSpesialisasi();
    }

    #[On('edit-spesialisasi')]
    public function editSpesialisasi($id = null)
    {
        $this->titleForm = "Update Spesialisasi";
        $this->idSpesialisasi = $id;
        $spesialisasi = $id ? ModelsSpesialisasi::find($id) : '';

        $spesialisasi ? $this->form->setSpesialisasi($spesialisasi) : '';
    }

    public function save()
    {
        $this->form->store($this->idSpesialisasi);

        $this->success('Data Spesialisasi Telah Disimpan.');

        $this->dispatch('safe-spesialisasi');
    }

    public function deleteSpesialisasi()
    {
        $this->modalSpesialisasi = false;

        ModelsSpesialisasi::where('id_spesialisasi', $this->selectedSpesialisasiId)->delete();

        $this->dispatch('save-spesialisasi');

        $this->success('Data berhasil Dihapus');
    }

    #[On('save-spesialisasi')]
    public function render()
    {
        $spesialisasi = ModelsSpesialisasi::paginate(5);
        $profesi = Profesi::get();

        return view('livewire.tenaga-medis.konfigurasi.spesialisasi', [
            'spesialisasi' => $spesialisasi,
            'profesi'      => $profesi,
        ]);
    }
}
