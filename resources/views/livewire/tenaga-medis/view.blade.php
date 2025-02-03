<div>
    <x-slot:headerActions>
        <div x-data>
            <x-post wire:key link="/tenaga-medis/create" />
            <x-button wire:key icon="o-wrench-screwdriver" label="Konfigurasi" class="btn-seccondary font-bold"
                link="/tenaga-medis/konfigurasi">
            </x-button>
        </div>
    </x-slot:headerActions>

    @if ($tenaga_medis->isEmpty())
        <div class="flex justify-center items-center h-64">
            <p class="text-gray-500 text-lg font-semibold">Belum ada data tenaga medis.</p>
        </div>
    @else
        <div class="grid grid-cols-12 gap-4">
            @foreach ($tenaga_medis as $item)
                <x-card class="col-span-12 md:col-span-6 lg:col-span-4"  shadow >
                    <x-header :title="$item->nama" size="text-xl">
                        <x-slot:actions>
                            <div class="flex gap-2">
                                <x-button icon="o-pencil-square" :link="'tenaga-medis/update/' . $item->id_tenaga_medis" class="btn-square btn-warning" tooltip="Edit" />
                                <x-button icon="o-trash" wire:click="delete({{$item->id_tenaga_medis}})" class="btn-square btn-error" tooltip="Delete" />
                            </div>
                        </x-slot:actions>
                    </x-header>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12">
                            <x-input label="NIK" value="{{ $item->nik }}" readonly />
                        </div>
                        <div class="col-span-6">
                            <x-input label="Nomor STR" value="{{ $item->no_str }}" readonly />
                        </div>
                        <div class="col-span-6">
                            <x-input label="Nomor HIS" value="{{ $item->ihs }}" readonly />
                        </div>
                        <div class="col-span-12">
                            <x-input label="Nomor Telepon" value="{{ $item->no_telp }}" readonly />
                        </div>

                        @php
                            $exists = DB::table('poliklinik_tenaga_medis')
                                ->where('id_tenaga_medis', $item->id_tenaga_medis)
                                ->exists();

                            $polikliniks = [];

                            if ($exists) {
                                $polikliniks = DB::table('poliklinik_tenaga_medis')
                                    ->join('poliklinik', 'poliklinik.id_poli', '=', 'poliklinik_tenaga_medis.id_poliklinik')
                                    ->where('poliklinik_tenaga_medis.id_tenaga_medis', $item->id_tenaga_medis)
                                    ->select('poliklinik.*')
                                    ->get();
                            }
                        @endphp

                            <div class="col-span-6">
                                <p class="semibold">Poliklinik</p>
                                <div class=" mt-3">
                                    @if (!empty($polikliniks))
                                        @foreach ($polikliniks as $poliklinik)
                                            <div class="px-5 py-2 badge-neutral w-fit rounded-full text-sm inline mr-2">
                                                {{ $poliklinik->nama_poli }}
                                            </div>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                    </div>
                </x-card>
            @endforeach
        </div>
    @endif

    <x-pagination :rows="$tenaga_medis" wire:model.live="perPage" />
</div>
