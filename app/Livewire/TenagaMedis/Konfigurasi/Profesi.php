<?php

namespace App\Livewire\TenagaMedis\Konfigurasi;

use App\Livewire\Forms\ProfesiForm;
use App\Models\Profesi as ModelsProfesi;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Profesi extends Component
{
    use Toast;
    public ProfesiForm $form;
    public $idProfesi;
    public $titleForm = "Input Profesi";
    public $gelar;
    public $perPage = 2;

    public $modalProfesi = false;
    public $selectedProfesiNama = null;
    public $selectedProfesiId = null;

    public $headers = [
        ['key' => 'no',         'label' => '#'],
        ['key' => 'nama',       'label' => 'Nama'],
        ['key' => 'code',       'label' => 'Kode'],
        ['key' => 'actions',    'label' => 'Action'],
    ];

    public function openModalProfesi($id, $nama)
    {
        $this->modalProfesi = true;

        $this->selectedProfesiNama = $nama;
        $this->selectedProfesiId = $id;
    }

    public function addNew()
    {
        $this->idProfesi = null;

        $this->titleForm = "Input Profesi";

        $this->form->setProfesi();
    }

    #[On('edit-profesi')]
    public function editProfesi($id = null)
    {
        $this->titleForm = "Update Profesi";
        $this->idProfesi = $id;
        $profesi = $id ? ModelsProfesi::find($id) : '';

        $profesi ? $this->form->setProfesi($profesi) : '';
    }

    public function save()
    {
        $this->form->store($this->idProfesi);

        $this->success('Data Profesi Telah Disimpan.');

        $this->dispatch('save-profesi');
        $this->dispatch('save-spesialisasi');
    }

    public function deleteProfesi()
    {
        $this->modalProfesi = false;

        ModelsProfesi::where('id_profesi', $this->selectedProfesiId)->delete();

        $this->dispatch('save-profesi');
        $this->dispatch('save-spesialisasi');

        $this->success('Data berhasil Dihapus');
    }

    #[On('save-profesi')]
    public function render()
    {
        $profesi = ModelsProfesi::paginate(5);

        return view('livewire.tenaga-medis.konfigurasi.profesi', [
            'profesi' => $profesi
        ]);
    }
}
