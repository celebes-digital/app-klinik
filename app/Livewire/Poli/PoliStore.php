<?php

namespace App\Livewire\Poli;

use App\Models\Poliklinik;

use App\Livewire\Forms\PoliForm;
use App\Traits\WilayahIndonesia;

use Mary\Traits\Toast;
use Livewire\Attributes\On;
use Livewire\Component;

class PoliStore extends Component
{
    use Toast;
    use WilayahIndonesia;

    public $idPoli;
    public PoliForm $form;

    public function setLokasi()
    {
        $status = $this->form->setLokasiPuskesmas();

        if ($status) {
            $this->setDataWilayah(
                $this->form->provinsi,
                $this->form->kabupaten,
                $this->form->kecamatan,
            );
            $this->success('Data lokasi puskesmas berhasil diatur');
            return;
        }
        $this->error('Data lokasi puskesmas gagal diatur');
    }

    #[On('set-poli')]
    public function setPoli($id)
    {
        $this->idPoli = $id;
        $this->form->setDataPoli(Poliklinik::find($id));
    }

    #[On('reset-form')]
    public function resetForm()
    {
        $this->form->reset();
        $this->idPoli = null;
    }

    public function save()
    {
        $this->form->store($this->idPoli);

        $this->success('Data poliklinik berhasil disimpan');
        $this->dispatch('reloadPoliList');
    }

    public function render()
    {
        return view('livewire.poli.poli-store');
    }
}
