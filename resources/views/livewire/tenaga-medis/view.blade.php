@php
    $tenaga_medis = App\Models\TenagaMedis::paginate($this->perPage);
@endphp

<div>
    <x-slot:headerActions>
        <div x-data>
            <x-post wire:key link="/tenaga-medis/create" />
            <x-button wire:key icon="o-wrench-screwdriver" label="Konfigurasi" class="btn-seccondary font-bold" link="/tenaga-medis/konfigurasi"></x-button>
        </div>
    </x-slot:headerActions>
    <div class="grid grid-cols-12 gap-4">
        @foreach ($tenaga_medis as $item)
            <x-card class="col-span-12 md:col-span-4" :title="$item->nama" shadow separator>
                <div class="grid grid-cols-12 gap-4"></div>
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
            </x-card>
        @endforeach
    </div>
</div>
