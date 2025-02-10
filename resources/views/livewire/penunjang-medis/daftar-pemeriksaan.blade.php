<div class="grid grid-cols-12 gap-8">
    <x-card class="col-span-7">
        <x-header title="Daftar Pemeriksaan" size="text-xl">
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

        <x-table :headers="$headers" :rows="$daftar_pemeriksaan" striped @row-click="alert($event.detail.name)" with-pagination>
            @scope('cell_keterangan', $item)
                <div>
                    {{ $item->keterangan ?? '-' }}
                </div>
            @endscope
            @scope('cell_actions', $item)
                <div class="flex gap-2">
                    <x-button icon="o-pencil-square" spinner class="btn-sm btn-warning" 
                        wire:click="edit({{ $item->id_daftar_pemeriksaan }})" 
                        tooltip="Edit"
                    />
                    <x-button icon="o-trash" spinner class="btn-sm btn-error" 
                        wire:click="openModal({{$item->id_daftar_pemeriksaan}}, '{{$item->nama}}')"
                        tooltip="Delete"
                    />
                    <x-button icon="o-arrow-down-on-square" spinner class="font-normal btn-sm btn-info" 
                        link="/setting/penunjang-medis/{{ $item->kode_penunjang }}/{{ $item->id_daftar_pemeriksaan }}"
                        tooltip="Item Pemeriksaan"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <x-card class="col-span-5">
        <x-header :title="$titleForm" size="text-xl">
            @if ($titleForm === 'Update Daftar Pemeriksaan')
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

                <div class="col-span-12">
                    <x-textarea rows="3" label="Keterangan" wire:model="form.keterangan" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>

    <x-modal wire:model="modal" class="backdrop-blur">
        <div>Kamu yakin menghapus data {{$selectedNama}} dan semua data yang terkait?</div>

        <x-slot:actions>
            <x-button label="Batalkan"  @click="$wire.modal = false" />
            <x-button label="Hapus Data" wire:click="delete()" class="btn-primary" />
        </x-slot:actions>
    </x-modal>
</div>
