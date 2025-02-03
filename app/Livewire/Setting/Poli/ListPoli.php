<?php

namespace App\Livewire\Setting\Poli;

use App\Livewire\Forms\PoliForm;
use App\Models\Poliklinik;
use App\Traits\WilayahIndonesia;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class ListPoli extends Component
{
    use Toast;
    use WithPagination;
    use WilayahIndonesia;

    public PoliForm $form;

    public $showModalDetail = false;
    public $showModalDelete = false;
    public $perPage = 10;

    public function showDetail(Poliklinik $poli)
    {
        if ($poli) {
            $this->form->setDataPoli($poli);
        }

        $this->showModalDetail = true;
    }

    public function updateDetail()
    {
        $this->form->updateDetailPoli();

        $this->showModalDetail = false;
        $this->success('Detail poliklinik berhasil diperbaharui');
    }

    public function tindakanMedis()
    {
        return Poliklinik::query()->paginate($this->perPage);
    }

    public function delete(Poliklinik $poli)
    {
        $poli->delete();
        $this->success('Data poliklinik berhasil dihapus');
    }

    #[On('reloadPoliList')]
    public function render()
    {
        return view('livewire.setting.poli.list-poli', [
            'poli' => $this->tindakanMedis(),
        ]);
    }
}
