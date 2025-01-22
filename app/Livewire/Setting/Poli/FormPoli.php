<?php

namespace App\Livewire\Setting\Poli;

use App\Models\Poliklinik;

use App\Livewire\Forms\PoliForm;
use App\Traits\WilayahIndonesia;

use Mary\Traits\Toast;
use Livewire\Attributes\On;
use Livewire\Component;

class FormPoli extends Component
{
    use Toast;
    use WilayahIndonesia;

    public $idPoli;
    public PoliForm $form;

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
        $this->resetForm();

        $this->dispatch('reloadPoliList');
    }

    public function render()
    {
        return view('livewire.setting.poli.form-poli');
    }
}
