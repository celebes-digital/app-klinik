<div>
    <x-slot:headerActions>
        <div x-data>
            <x-post wire:key link="/tenaga-medis/create" />
            <x-button wire:key icon="o-wrench-screwdriver" label="Konfigurasi" class="btn-seccondary font-bold"
                link="/tenaga-medis/konfigurasi"></x-button>
        </div>
    </x-slot:headerActions>
    <div class="grid grid-cols-12 gap-4">
        @foreach ($tenaga_medis as $item)
            <x-card class="col-span-12 md:col-span-6 lg:col-span-4" :title="$item->nama" shadow separator>
                <div class="space-y-2">
                    <div class="col-span-6">
                        <x-input label="NIK" value="{{ $item->nik }}" readonly />
                    </div>
                    <div class="col-span-6">
                        <x-input label="Nomor STR" value="{{ $item->no_str }}" readonly />
                    </div>
                    <div class="col-span-6">
                        <x-input label="Nomor HIS" value="{{ $item->ihs }}" readonly />
                    </div>
                    <div class="col-span-6">
                        <x-input label="Nomor Telepon" value="{{ $item->no_telp }}" readonly />
                    </div>
                    @php
                        $polikliniks = DB::table('poliklinik_tenaga_medis')
                            ->join('poliklinik', 'poliklinik.id', '=', 'poliklinik_tenaga_medis.id_poliklinik')
                            ->where('poliklinik_tenaga_medis.id_tenaga_medis', $item->id_tenaga_medis)
                            ->select('poliklinik.*')
                            ->get();
                    @endphp

                    <div class="col-span-6">
                        @foreach ($polikliniks as $poliklinik)
                            <div class="px-3 py-1 bg-gray-200 w-fit rounded-full text-sm inline mr-2">
                                {{ $poliklinik->nama_poli }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
    <x-pagination :rows="$tenaga_medis" wire:model.live="perPage" />
</div>
