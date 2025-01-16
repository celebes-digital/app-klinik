@php
    $profesi = App\Models\Profesi::paginate(5);

    $headers = [
        ['key' => 'no',         'label' => '#'],
        ['key' => 'nama',       'label' => 'Nama'],
        ['key' => 'code',       'label' => 'Kode'],
    ];
@endphp

<div class="col-span-12 grid grid-cols-12 gap-4">
    <x-card class="col-span-5">
        <x-header title="Daftar Profesi" size="text-xl" />

        <x-table :headers="$headers" :rows="$profesi" striped with-pagination >
            <x-slot:empty>
                <x-icon name="o-cube" label="It is empty." />
            </x-slot:empty>

            @scope('cell_no', $profesi)
                {{ $loop->index + 1 }}
            @endscope

            {{-- @scope('actions', $profesi)
                <div class="flex gap-2">
                    <x-button 
                        icon="o-pencil-square" 
                        wire:click="$dispatch('set-spesialisasi', { id: {{ $profesi->id }}})" 
                        spinner 
                        class="btn-sm" 
                    />
                    <x-button 
                        icon="o-trash" 
                        wire:click="delete({{ $profesi->id }})" 
                        spinner 
                        class="btn-sm" 
                    />
                </div>
            @endscope --}}
        </x-table>
    </x-card>

    <div class="col-span-7">
        <x-card>
            <x-header title="Input Profesi" size="text-xl" />

            <x-form wire:target="submit" wire:submit.prevent="save">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <x-input label="Nama" wire:model="form.nama" />
                    </div>
                    <div class="col-span-6">
                        <x-input label="Kode" wire:model="form.code" />
                    </div>
                </div>

                <x-slot:actions>
                    <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-card>
    </div>
</div>    
