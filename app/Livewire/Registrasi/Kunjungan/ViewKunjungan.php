<?php

namespace App\Livewire\Registrasi\Kunjungan;

use App\Models\Pasien;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kunjungan')]
class ViewKunjungan extends Component
{
    public $search          = '';
    public $liveSearching   = '';
    public $selectedSearch  = 'nama';
    public $isLiveSearch    = false;

    public $tglLahir        = '';
    public $kelamin         = '';
    public $pasien          = [];

    public function mount()
    {
        $this->isLiveSearch     = false;
        $this->selectedSearch   = 'nama';
    }

    public function updatedLiveSearching()
    {
        if ($this->isLiveSearch) {
            $this->pasien = Pasien::where($this->selectedSearch, 'like', '%' . $this->liveSearching . '%')
                ->limit(5)->get() ?? [];
        }
    }

    public function updatedSelectedSearch()
    {
        $this->reset('search', 'pasien', 'isLiveSearch');
    }

    public function updatedIsLiveSearch()
    {
        $this->reset('pasien');
    }

    public function searchPasien()
    {
        if ($this->selectedSearch == 'nama') {
            $this->pasien = Pasien::where('nama', $this->search)
                ->where('tgl_lahir', $this->tglLahir)
                ->where('kelamin', $this->kelamin)
                ->limit(5)
                ->get() ?? [];
        } else {
            $this->pasien = Pasien::where('nik', $this->search)->get() ?? [];
        }
    }

    public function render()
    {
        return view('livewire.registrasi.kunjungan.view-kunjungan');
    }
}
