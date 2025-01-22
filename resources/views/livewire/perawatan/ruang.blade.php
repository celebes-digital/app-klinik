<x-card class="col-span-7">
    <x-header :title="$titleForm" size="text-xl">
        @if ($titleForm === 'Update Ruang Perawatan')
            <x-slot:actions>
                <x-button icon="o-plus" label="Tambah" wire:click="addNew()" />
            </x-slot:actions>
        @endif
    </x-header>
    <x-form wire:target="submit" wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-input label="Nama" wire:model="form.nama" required />
            </div>
        </div>

        <x-slot:actions>
            <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</x-card>
