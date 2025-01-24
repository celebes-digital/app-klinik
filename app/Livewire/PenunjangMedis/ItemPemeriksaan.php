<?php

namespace App\Livewire\PenunjangMedis;

use App\Models\DaftarPemeriksaan;
use App\Models\ItemPemeriksaan as ModelsItemPemeriksaan;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class ItemPemeriksaan extends Component
{
    use Toast;

    public  $form;

    public $id_daftar_pemeriksaan;
    public $kode_penunjang = '';
    public $perPage = 5;
    public $data_daftar_pemeriksaan;
    public $titleForm = "";
    public $subTitleForm = "";
    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'nama', 'label' => 'Item Pemeriksaan'],
        ['key' => 'keterangan', 'label' => 'Harga Dasar'],
        ['key' => 'keterangan', 'label' => 'Harga Pemeriksaan'],
        ['key' => 'keterangan', 'label' => 'Note'],
        ['key' => 'actions', 'label' => 'Actions'],
    ];

    public function mount($id_daftar_pemeriksaan=null)
    {
        $this->data_daftar_pemeriksaan = DaftarPemeriksaan::find($id_daftar_pemeriksaan);


        $this->subTitleForm = $this->data_daftar_pemeriksaan->nama;
        $this->titleForm = "Data Item Pemeriksaan ";
    }

    #[On('changes')]
    public function editRuang($id = null)
    {
        $this->id_daftar_pemeriksaan = $id;
        $ruang = $id ? ModelsItemPemeriksaan::find($id) : null;
        $this->titleForm = "Update Ruang Perawatan";

        if ($ruang) {
            $this->form->setDaftarPemeriksaan($ruang);
        }
    }

    public function addNew()
    {
        $this->id_daftar_pemeriksaan = null;
        $this->titleForm = "Input Ruang Perawatan";
        $this->form->setDaftarPemeriksaan();
    }

    public function save()
    {
        $this->form->store($this->id_daftar_pemeriksaan);

        $this->success("Data Ruangan Telah Disimpan");

        $this->dispatch('save-ruang');
    }

    public function render()
    {
        $daftar_pemeriksaan = ModelsItemPemeriksaan::paginate($this->perPage);

        return view('livewire.penunjang-medis.item-pemeriksaan', [
            'daftar_pemeriksaan' => $daftar_pemeriksaan,
        ]);
    }
}
