@php
    $tenaga_medis = App\Models\TenagaMedis::paginate($this->perPage);
@endphp

<div>
    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-12" title="Daftar Tenaga Medis" shadow separator>
            <x-slot:menu>
                <x-post link="/tenaga-medis/create" />
                <x-button icon="o-wrench-screwdriver" label="Konfigurasi" class="btn-seccondary font-bold" link="/tenaga-medis/konfigurasi"></x-button>
            </x-slot:menu>

            <x-table :headers="$headers" :rows="$tenaga_medis" striped with-pagination per-page="perPage">
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
                @scope('actions', $tenaga_medis)
                    <div class="flex gap-2">
                        <x-button 
                            icon="o-pencil-square" 
                            wire:click="$dispatch('set-tenaga_medis', { id: {{ $tenaga_medis->id_tenaga_medis }}})" 
                            link="/tenaga-medis/update/{{ $tenaga_medis->id_tenaga_medis }}"
                            spinner 
                            class="btn-sm" 
                        />
                        <x-button 
                            icon="o-trash" 
                            wire:click="delete({{ $tenaga_medis->id_tenaga_medis }})" 
                            spinner 
                            class="btn-sm" 
                        />
                    </div>
                @endscope
            </x-table>
        </x-card>
    </div>
</div>
