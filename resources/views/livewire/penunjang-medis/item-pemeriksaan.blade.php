<div class="grid grid-cols-12 gap-8">
    <x-card class="col-span-7">
        <x-header title="Daftar Pemeriksaan" size="text-xl">
        </x-header>

        <x-table :headers="$headers" :rows="$daftar_pemeriksaan" striped @row-click="alert($event.detail.name)">
            @scope('cell_actions', $item)
                <div class="flex gap-2">
                    <x-button icon="o-pencil-square" spinner class="btn-sm btn-warning" 
                        {{-- wire:click="$dispatch('edit-ruang', { id: {{ $item->id_ruang_perawatan }}})"  --}}
                    />
                    <x-button icon="o-trash" spinner class="btn-sm btn-error" 
                        {{-- wire:click="openModalRuang({{$item->id_ruang_perawatan}}, '{{$item->nama}}')" --}}
                    />
                    <x-button icon="o-arrow-down-on-square" spinner class="font-normal btn-sm btn-info" 
                        link="/penunjang-medis/{{ $item->kode_penunjang }}/{{ $item->id_daftar_pemeriksaan }}"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
    <x-card class="col-span-5">
        <x-header :title="$titleForm" :subtitle="$subTitleForm" size="text-xl">
        </x-header>

        <x-form wire:target="submit" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-input label="Nama Pemeriksaan" wire:model="form.nama" />
                </div>

                <div class="col-span-8">
                    <x-input label="Item Pemeriksaan" wire:model="form.nama" hint="Isi jika nama pemeriksaan tidak di temukan" />
                </div>

                <div class="col-span-4">
                    <x-input label="Satuan" wire:model="form.satuan" />
                </div>

                <div class="col-span-6">
                    <x-input label="Harga Dasar" wire:model="form.harga_dasar" />
                </div>

                <div class="col-span-6">
                    <x-input label="Harga Pemeriksaan" wire:model="form.harga_pemeriksaan" />
                </div>

                {{-- <div class="col-span-8">
                    <x-input label="LOINC Display" wire:model="form.loinc_display" required />
                </div>

                <div class="col-span-4">
                    <x-input label="LOINC Code" wire:model="form.loinc_code" />
                </div> --}}

                <div class="col-span-12">
                    <x-textarea rows="3" label="Note" wire:model="form.note" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
