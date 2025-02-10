<?php

namespace App\Livewire\Setting\PenunjangMedis;

use App\Livewire\Forms\DaftarPemeriksaanForm;
use App\Models\DaftarPemeriksaan as ModelsDaftarPemeriksaan;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Daftar Pemeriksaan')]
class DaftarPemeriksaan extends Component
{
    use Toast;

    public DaftarPemeriksaanForm $form;
    
    public $id_daftar_pemeriksaan;
    public $titleForm = "Input Data Pemeriksaan";
    public $kode_penunjang = '';
    public $subTitleForm = "";
    public $perPage = 5;
    public $search = '';
    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'nama', 'label' => 'Pemeriksaan'],
        ['key' => 'keterangan', 'label' => 'Keterangan'],
        ['key' => 'actions', 'label' => 'Actions'],
    ];

    public $modal = false;
    public $selectedId = null;
    public $selectedNama = null;

    private function getTableColumns($model)
    {
        return Schema::getColumnListing($model->getTable());
    }

    public function mount($kode_penunjang = null)
    {
        $this->form->kode_penunjang  = $kode_penunjang;
    }

    public function openModal($id, $nama)
    {
        $this->modal = true;

        $this->selectedNama = $nama;
        $this->selectedId = $id;
    }

    public function edit($id = null)
    {
        $this->id_daftar_pemeriksaan = $id;
        $ruang = $id ? ModelsDaftarPemeriksaan::find($id) : null;
        $this->titleForm = "Update Daftar Pemeriksaan";

        if ($ruang) {
            $this->form->setDaftarPemeriksaan($ruang);
        }
    }

    public function delete()
    {
        $this->modal = false;
        ModelsDaftarPemeriksaan::where('id_daftar_pemeriksaan', $this->selectedId)->delete();
        $this->success('Data berhasil Dihapus');
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

    #[On('search')]
    public function render()
    {
        // Ambil semua kolom dari tabel model
        $columns = $this->getTableColumns(new ModelsDaftarPemeriksaan);

        // Mulai query
        $query = ModelsDaftarPemeriksaan::where('kode_penunjang', $this->kode_penunjang);

        // Jika ada input pencarian, tambahkan kondisi LIKE untuk semua kolom
        if ($this->search) {
            $query->where(function ($subQuery) use ($columns) {
                foreach ($columns as $column) {
                    $subQuery->orWhere($column, 'like', '%' . $this->search . '%');
                }
            });
        }

        // Paginate hasil pencarian
        // dd($query->paginate($this->perPage));
        $daftar_pemeriksaan = $query->paginate($this->perPage);

        return view('livewire.penunjang-medis.daftar-pemeriksaan', [
            'daftar_pemeriksaan' => $daftar_pemeriksaan,
        ]);
    }
}
