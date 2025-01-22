@php
    $profesi = App\Models\Profesi::get();
@endphp

<div class="col-span-12 grid grid-cols-12 gap-4">
    <x-card class="col-span-5">
        <x-header title="Daftar Spesialisasi" size="text-xl" />

        <x-table :headers="$headers" :rows="$spesialisasi" striped with-pagination>
            <x-slot:empty>
                <x-icon name="o-cube" label="It is empty." />
            </x-slot:empty>

            @scope('cell_no', $spesialisasi)
                {{ $loop->index + 1 }}
            @endscope

            @scope('cell_actions', $item)
                <div class="flex gap-2">
                    <x-button icon="o-pencil-square"
                        wire:click="$dispatch('edit-spesialisasi', { id: {{ $item->id_spesialisasi }}})" spinner
                        class="btn-sm" />

                    <x-button icon="o-trash" spinner class="btn-sm"
                        wire:click="openModalSpesialisasi({{ $item->id_spesialisasi }}, '{{ $item->nama }}')" />
                </div>
            @endscope
        </x-table>
    </x-card>

    <x-modal wire:model="modalSpesialisasi" class="backdrop-blur">
        <div>Kamu yakin menghapus data {{ $selectedSpesialisasiNama }} ?</div>

        <x-slot:actions>
            <x-button label="Batalkan" @click="$wire.modalSpesialisasi = false" />
            <x-button label="Hapus Data" wire:click="deleteSpesialisasi()" class="btn-primary" />
        </x-slot:actions>
    </x-modal>

    <div class="col-span-7">
        <x-card>
            <x-header :title="$titleForm" size="text-xl">
                @if ($titleForm === 'Update Spesialisasi')
                    <x-slot:actions>
                        <x-button icon="o-plus" label="Tambah" wire:click="addNew()" />
                    </x-slot:actions>
                @endif
            </x-header>

            <x-form wire:submit="save" wire:target.prevent="submit">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <x-input label="Nama" wire:model="form.nama" />
                    </div>
                    <div class="col-span-4">
                        <x-input label="Kode" wire:model="form.code" />
                    </div>
                    <div class="col-span-4">
                        <x-choices-offline label="Profesi" wire:model="form.id_profesi" :options="$profesi"
                            option-value="id_profesi" option-label="nama" single searchable />
                    </div>
                </div>

                <x-slot:actions>
                    <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-card>
    </div>
</div>
