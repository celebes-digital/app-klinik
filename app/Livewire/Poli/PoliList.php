<?php

namespace App\Livewire\Poli;

use App\Models\Poliklinik;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class PoliList extends Component
{
    use Toast;
    public $poli;

    public function mount()
    {
        $this->poli = Poliklinik::all();
    }

    #[On('reloadPoliList')]
    public function reloadPoliList()
    {
        $this->mount();
    }

    public function delete($id)
    {
        Poliklinik::find($id)->delete();

        $this->success('Data poliklinik berhasil dihapus');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.poli.poli-list', [
            'poli' => $this->poli,
        ]);
    }
}
