<?php

namespace App\Livewire\Setting\Poli;

use App\Livewire\Forms\PoliForm;
use App\Models\Poliklinik;
use App\Traits\WilayahIndonesia;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class ListPoli extends Component
{
    use Toast;
    use WilayahIndonesia;

    public PoliForm $form;

    public $showModalDetail = false;
    public $showModalDelete = false;

    public function showDetail(Poliklinik $poli)
    {
        if ($poli) {
            $this->setDataWilayah($poli->provinsi, $poli->kabupaten, $poli->kecamatan);
            $this->form->setDataPoli($poli);
        }

        $this->showModalDetail = true;
    }

    public function showDelete(Poliklinik $poli)
    {
        $this->form->setDataPoli($poli);
        $this->showModalDelete = true;
    }

    public function updateDetail()
    {
        $this->form->updateDetailPoli();

        $this->showModalDetail = false;
        $this->success('Detail poliklinik berhasil diperbaharui');
    }

    public function delete()
    {
        $this->form->delete();
        $this->success('Data poliklinik berhasil dihapus');
    }

    #[On('reloadPoliList')]
    public function render()
    {
        return view('livewire.setting.poli.list-poli', [
            'poli' => Poliklinik::all()
        ]);
    }
}
