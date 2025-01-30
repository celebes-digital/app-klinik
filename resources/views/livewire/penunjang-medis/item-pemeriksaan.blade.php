<div class="grid grid-cols-12 gap-8">
    <x-card class="col-span-12">
        <x-header title="Daftar Item Pemeriksaan" size="text-xl">
            <x-slot:middle class="!justify-end">
                <x-input icon="o-magnifying-glass" wire:model="search" placeholder="Search..." wire:keydown.enter="$dispatch('search')" />
            </x-slot:middle>
            <x-slot:actions>
                <x-button label="Cari Data" 
                    wire:click="$dispatch('search')"
                ></x-button>
                <x-button label="Clear" 
                    icon="o-funnel"
                    wire:click="$dispatch('search', {'search' : ''})"
                ></x-button>
            </x-slot:actions>
        </x-header>

        <x-table :headers="$headers" :rows="$item_pemeriksaan" striped
            per-page="perPage" 
            :per-page-values="[5, 10, 20]"
            with-pagination
        >
            @scope('cell_id', $item)
                <div>
                    {{ $loop->index + 1 }}
                </div>
            @endscope
            @scope('cell_harga_dasar', $item)
                <div>
                    {{ $item->harga_dasar ?? '-' }}
                </div>
            @endscope
            @scope('cell_harga_pemeriksaan', $item)
                <div>
                    {{ $item->harga_pemeriksaan ?? '-' }}
                </div>
            @endscope
            @scope('cell_note', $item)
                <div>
                    {{ $item->note ?? '-' }}
                </div>
            @endscope
            @scope('cell_actions', $item)
                <div class="flex gap-2">
                    <x-button icon="o-pencil-square" spinner class="btn-sm btn-warning" wire:click="edit({{$item->id_item_pemeriksaan}})"
                        {{-- wire:click="$dispatch('edit-ruang', { id: {{ $item->id_ruang_perawatan }} })"  --}}
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <x-modal wire:model="modal" :title="$titleForm" :subtitle="$subTitleForm" box-class="max-w-4xl">
        <x-form wire:target="submit" wire:submit.prevent="save" no-separator>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-input label="Nama Pemeriksaan" wire:model="form.nama_pemeriksaan" readonly />
                </div>

                <div class="col-span-4">
                    <x-input label="Code Pemeriksaan" wire:model="form.code" readonly />
                </div>

                <div class="col-span-4">
                    <x-input label="Permintaan/Hasil" wire:model="form.permintaan_hasil" readonly />
                </div>

                <div class="col-span-4">
                    <x-input label="Satuan" wire:model="form.satuan" readonly />
                </div>

                <div class="col-span-6">
                    <x-input label="Harga Dasar" wire:model="form.harga_dasar" />
                </div>

                <div class="col-span-6">
                    <x-input label="Harga Pemeriksaan" wire:model="form.harga_pemeriksaan" />
                </div>

                <div class="col-span-12">
                    <x-textarea rows="3" label="Catatan" wire:model="form.note" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.modal = false" />
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
