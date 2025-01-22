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

            @scope('cell_actions', $item)
                <div class="flex gap-2">
                    <x-button 
                        icon="o-pencil-square" 
                        wire:click="$dispatch('edit-profesi', { id: {{ $item->id_profesi }}})" 
                        {{-- wire:click="$dispatch('edit-kamar', { id: {{ $item->id_kamar_perawatan }}})"  --}}
                        spinner 
                        class="btn-sm" 
                    />
                    <x-button 
                        icon="o-trash" 
                        wire:click="delete({{ $item->id }})" 
                        spinner 
                        class="btn-sm" 
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <div class="col-span-7">
        <x-card>
            <x-header :title="$titleForm" size="text-xl">
                @if($titleForm === 'Update Profesi')
                    <x-slot:actions>
                        <x-button icon="o-plus" label="Tambah" wire:click="addNew()" />
                    </x-slot:actions>
                @endif
            </x-header>

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
