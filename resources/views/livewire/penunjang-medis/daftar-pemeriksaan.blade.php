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
        <x-header :title="$titleForm" size="text-xl">
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
</div>
