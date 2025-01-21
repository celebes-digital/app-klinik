<x-card title="Input Ruang Perawatan" class="col-span-7">
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
