<?php

namespace App\Livewire\Forms;

use App\Models\Staff;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StaffForm extends Form
{
    public ?Staff $staff;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required|digits:16|unique:staff,nik')]
    public $nik = "";
    
    #[Validate('required')]
    public $tgl_lahir = "";

    #[Validate('required')]
    public $alamat = "";

    #[Validate('required')]
    public $no_telp = "";

    #[Validate('required')]
    public $no_str = "";

    #[Validate('required')]
    public $ihs = "";

    #[Validate('required|in:male,female')]
    public $kelamin = "";

    public function setStaff(Staff $staff)
    {
        $this->staff = $staff;

        $this->nama         = $staff->nama;
        $this->nik          = $staff->nik;
        $this->tgl_lahir    = $staff->tgl_lahir;
        $this->alamat       = $staff->alamat;
        $this->no_telp      = $staff->no_telp;
        $this->kelamin      = $staff->kelamin;
        $this->no_str       = $staff->no_str;
        $this->ihs          = $staff->ihs;
    }

    public function store($id_staff)
    {
        $this->validate();

        if (!$id_staff) {
            Staff::create($this->all());
        } else {
            $this->staff->update($this->all());
        }
    }
}
