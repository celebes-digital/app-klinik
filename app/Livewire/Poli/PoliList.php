<?php

namespace App\Livewire\Poli;

use App\Livewire\Forms\PoliForm;
use App\Models\Poliklinik;
use App\Traits\WilayahIndonesia;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class PoliList extends Component
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
        $this->form->fill($poli);
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
        return view('livewire.poli.poli-list', [
            'poli' => Poliklinik::all()
        ]);
    }
}
