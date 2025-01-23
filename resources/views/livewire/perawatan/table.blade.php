<x-card title="Data Ruangan Perawatan" class="h-full">
    <x-table :headers="$headers" :rows="$ruangPerawatan" wire:model="expanded" expandable-key="id_ruang_perawatan" expandable with-pagination>
        @scope('expansion', $item)
            <div class="bg-base-200 p-8 font-bold">
                @php
                    $kamarList = \App\Models\KamarPerawatan::where('id_ruang_perawatan', $item->id_ruang_perawatan)->get();

                    $headersKamar = [
                        ['key' => 'id_kamar_perawatan', 'label' => '#', 'class' => 'hidden'],
                        ['key' => 'nama',               'label' => 'Nama'],
                        ['key' => 'service_class',      'label' => 'Kelas'],
                        ['key' => 'jumlah_kasur',       'label' => 'Tempat Tidur'],
                        ['key' => 'status',             'label' => 'Status'],
                        ['key' => 'actions',            'label' => 'Aksi'],
                    ];
                @endphp
                <x-table :headers="$headersKamar" :rows="$kamarList">
                    <x-slot:empty>
                        <x-icon name="o-cube" label="Data Kosong." />
                    </x-slot:empty>
                    @scope('cell_actions', $item)
                        <div class="flex">
                            <x-button 
                                icon="o-pencil-square" 
                                spinner class="btn-sm" 
                                wire:click="$dispatch('edit-kamar', { id: {{ $item->id_kamar_perawatan }}})" 
                            />
                            <x-button icon="o-trash" spinner class="btn-sm" 
                                wire:click="openModalKamar({{$item->id_kamar_perawatan}}, '{{$item->nama}}')"
                            />
                        </div>
                    @endscope
                </x-table>
            </div>
        @endscope

        @scope('cell_actions', $item)
            <div class="flex gap-2">
                <x-button icon="o-pencil-square" spinner class="btn-sm" wire:click="$dispatch('edit-ruang', { id: {{ $item->id_ruang_perawatan }}})" />
                <x-button icon="o-trash" spinner class="btn-sm" 
                    wire:click="openModalRuang({{$item->id_ruang_perawatan}}, '{{$item->nama}}')"
                />
            </div>
        @endscope
    </x-table>

    <x-modal wire:model="modalRuang" class="backdrop-blur">
        <div>Kamu yakin menghapus data {{$selectedRuangNama}} ?</div>

        <x-slot:actions>
            <x-button label="Batalkan"  @click="$wire.modalRuang = false" />
            <x-button label="Hapus Data" wire:click="deleteRuang()" class="btn-primary" />
        </x-slot:actions>
    </x-modal>

    <x-modal wire:model="modalKamar" class="backdrop-blur">
        <div>Kamu yakin menghapus data {{$selectedKamarNama}} ?</div>

        <x-slot:actions>
            <x-button label="Batalkan" @click="$wire.modalKamar = false" />
            <x-button label="Hapus Data" wire:click="deleteKamar()"  class="btn-primary" />
        </x-slot:actions>
    </x-modal>
</x-card>