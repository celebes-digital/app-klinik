@php
    $pasien = App\Models\Pasien::paginate($this->perPage);

    $headers = [
        ['key' => 'id_pasien',    'label' => '#'],
        ['key' => 'nama',         'label' => 'Nama'],
        ['key' => 'tempat_lahir', 'label' => 'Tempat. Lahir'],
        ['key' => 'tgl_lahir',    'label' => 'Tgl. Lahir'],
        ['key' => 'nik',          'label' => 'NIK'],
        ['key' => 'nik_ibu',      'label' => 'NIK Ibu'],
        ['key' => 'kelamin',      'label' => 'Kelamin'],
        ['key' => 'no_bpjs',      'label' => 'No. BPJS'],
    ];
@endphp

<div>
    <x-header title="Pasien" separator />
    
    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-12" title="Daftar Pasien" shadow separator>
            <x-slot:menu>
                <x-post link="/pasien/create" />
            </x-slot:menu>

            <x-table :headers="$headers" :rows="$pasien" striped with-pagination per-page="perPage" link="pasien/detail/{id_pasien}">
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
                @scope('cell_status_nikah', $status)
                    <p>
                        {{ 
                            $status->status_nikah   == 'Divorced'   ? 'Cerai'   : 
                            ($status->status_nikah  == 'Married'    ? 'Menikah' : 
                            ($status->status_nikah  == 'Widowed'    ? 'Janda'   : 'Belum Menikah'))
                        }}
                    </p>
                @endscope

                @scope('cell_kelamin', $kelamin)
                    <p>{{ $kelamin->kelamin == 'male' ? 'Laki-laki' : 'Perempuan'}}</p>
                @endscope

                {{-- Special `actions` slot --}}
                @scope('actions', $pasien)
                    {{-- <x-button icon="o-trash" wire:click="delete({{ $pasien->id_pasien }})" spinner class="btn-sm" /> --}}
                    <x-button icon="o-pencil" link="pasien/update/{{ $pasien->id_pasien }}" spinner class="btn-sm" />
                @endscope
            </x-table>
        </x-card>
    </div>
</div>