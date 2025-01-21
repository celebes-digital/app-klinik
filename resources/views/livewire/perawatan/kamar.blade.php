<x-card title="Input Kamar Perawatan" class="col-span-7">
    <x-form wire:target="submit" wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-choices 
                    label="Ruang Perawatan" 
                    wire:model="form.id_ruang_perawatan"
                    :options="$ruang_perawatan"
                    option-label="nama"
                    option-value="id_ruang_perawatan"
                    single
                    required
                />
            </div>
            <div class="col-span-6">
                <x-input label="Nama" wire:model="form.nama" required />
            </div>
            <div class="col-span-4">
                <x-input label="Jumlah Kasur" wire:model="form.jumlah_kasur" required />
            </div>
            <div class="col-span-4">
                <x-choices 
                    label="Kelas" 
                    wire:model="form.service_class"
                    :options="$kelas"
                    required
                    single
                />
            </div>
            <div class="col-span-4">
                <x-choices 
                    label="Status" 
                    wire:model="form.status"
                    :options="$status"
                    required
                    single
                />
            </div>
        </div>

        <x-slot:actions>
            <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</x-card>
