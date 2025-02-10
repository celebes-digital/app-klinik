<?php

namespace App\Livewire\Setting\PenunjangMedis;

use App\Livewire\Forms\ItemPemeriksaanForm;
use App\Models\DaftarPemeriksaan;
use App\Models\ItemPemeriksaan as ModelsItemPemeriksaan;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class ItemPemeriksaan extends Component
{
    use Toast;

    public ItemPemeriksaanForm $form;

    public $id_daftar_pemeriksaan;
    public $kode_penunjang = '';
    public $perPage = 5;
    public $data_daftar_pemeriksaan;
    public $titleForm = "";
    public $subTitleForm = "";
    public $search = "";
    public $modal;

    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'code', 'label' => 'Code Loinc'],
        ['key' => 'nama_pemeriksaan', 'label' => 'Nama Pemeriksaan'],
        ['key' => 'display', 'label' => 'Display'],
        ['key' => 'permintaan_hasil', 'label' => 'Permintaan/Hasil'],
        ['key' => 'satuan', 'label' => 'Satuan'],
        ['key' => 'harga_dasar', 'label' => 'Harga Dasar'],
        ['key' => 'harga_pemeriksaan', 'label' => 'Harga Pemeriksaan'],
        ['key' => 'note', 'label' => 'Catatan'],
        ['key' => 'actions', 'label' => 'Actions'],
    ];

    private function getTableColumns($model)
    {
        return Schema::getColumnListing($model->getTable());
    }


    public function mount($id_daftar_pemeriksaan=null)
    {
        $this->data_daftar_pemeriksaan = DaftarPemeriksaan::find($id_daftar_pemeriksaan);


        $this->subTitleForm = $this->data_daftar_pemeriksaan->nama ?? '';
        $this->titleForm = "Data Item Pemeriksaan ";
    }

    #[On('changes')]
    public function editRuang($id = null)
    {
        $this->id_daftar_pemeriksaan = $id;
        $ruang = $id ? ModelsItemPemeriksaan::find($id) : null;
        $this->titleForm = "Update Item Pemeriksaan";

        if ($ruang) {
            $this->form->setItemPemeriksaan($ruang);
        }
    }

    public function save()
    {
        $this->form->store($this->id_daftar_pemeriksaan);

        $this->success("Data item pemeriksaan telah diupdate");

        $this->dispatch('search');
        $this->modal = false;
    }

    public function edit($id = null)
    {
        $this->titleForm = "Update Item Pemeriksaan";
        $this->modal = true;
        $this->form->setItemPemeriksaan(ModelsItemPemeriksaan::find($id));

    }

    #[On('search')]
    public function render()
    {
        // Ambil semua kolom dari tabel model
        $columns = $this->getTableColumns(new ModelsItemPemeriksaan);

        // Mulai query
        $query = ModelsItemPemeriksaan::where('id_daftar_pemeriksaan', $this->id_daftar_pemeriksaan);

        // Jika ada input pencarian, tambahkan kondisi LIKE untuk semua kolom
        if ($this->search) {
            $query->where(function ($subQuery) use ($columns) {
                foreach ($columns as $column) {
                    $subQuery->orWhere($column, 'like', '%' . $this->search . '%');
                }
            });
        }

        // Paginate hasil pencarian
        $item_pemeriksaan = $query->paginate($this->perPage);

        return view('livewire.penunjang-medis.item-pemeriksaan', [
            'item_pemeriksaan' => $item_pemeriksaan,
        ]);
    }
}
