<div>
    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-12" title="Daftar Pasien" shadow separator>
            <x-slot:menu>
                <x-post link="/pasien/create" />
            </x-slot:menu>

            <x-table :headers="$headers" :rows="$pasien" striped with-pagination per-page="perPage"
                link="pasien/detail/{id_pasien}">
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
                @scope('cell_kelamin', $kelamin)
                    <p>{{ $kelamin->kelamin == 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
                @endscope

                @scope('actions', $pasien)
                    <div class="flex gap-2">
                        {{-- <x-button icon="o-trash" wire:click="delete({{ $pasien->id_pasien }})" spinner class="btn-sm" /> --}}
                        <x-button icon="o-pencil-square" link="pasien/update/{{ $pasien->id_pasien }}" spinner class="btn-sm btn-warning" tooltip="Edit" />
                        <x-button icon="o-trash" spinner class="btn-sm btn-error" tooltip="Delete" />
                    </div>
                @endscope
            </x-table>
        </x-card>
    </div>
</div>
