@php
    $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'name', 'label' => 'Nice Name'],
        ['key' => 'no_pasien', 'label' => 'Nomor Pasien'],
        ['key' => 'nik', 'label' => 'NIK'],
        ['key' => 'tgl_lahir', 'label' => 'Tanggal Lahir'],
    ];

    $options = [
        ['id' => 'nama', 'name' => 'Berdasarkan Nama', 'placeholder' => 'Masukkan nama pasien'],
        ['id' => 'nik', 'name' => 'Berdasarkan NIK', 'placeholder' => 'Masukkan NIK pasien'],
    ];

    $kelaminOptions = [
        ['id' => '', 'name' => 'Pilih jenis kelamin'],
        ['id' => 'male', 'name' => 'Laki-laki'],
        ['id' => 'female', 'name' => 'Perempuan'],
    ];
@endphp

<div 
    class="space-y-6" 
    x-data="{ 
        selectedSearch: $wire.entangle('selectedSearch'),
        liveSearch: $wire.entangle('isLiveSearch'),
        
        liveSearching: $wire.entangle('liveSearching').live,
        search: $wire.entangle('search'),

        searchTemp: '', 

        resetSearch() {
            this.searchTemp = ''
            this.search = ''
            this.liveSearching = ''
        }
    }" 
    
    x-init="
        $watch('liveSearch', value => value ? $refs.searchTemp.focus() : ''),
        $watch('selectedSearch', value => value == 'nik' ? $refs.searchTemp.focus() : $refs.kelamin.focus())
    "
>
    <x-card title="Pencarian Pasien" class="py-8 px-14" separator>
        <x-slot:menu class="space-x-4">
            <div x-show="selectedSearch == 'nama'">
                <x-toggle
                    label="Pencarian langsung" 
                    wire:model.live="isLiveSearch" 
                />
            </div>
            <x-select 
                label="" 
                icon="o-funnel" 
                :options="$options" 
                wire:model.live="selectedSearch" 
            />
        </x-slot:menu>

        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-5">
            
            <div x-show="!liveSearch && selectedSearch == 'nama'">
                <x-select 
                    label="" 
                    x-ref="kelamin"
                    icon="o-finger-print" 
                    :options="$kelaminOptions" 
                    wire:model.live="kelamin" 
                    hint="Jenis kelamin"
                />
            </div>

            <div x-show="!liveSearch && selectedSearch == 'nama'">
                <x-datetime 
                    placeholder="Tanggal lahir" 
                    label="" 
                    wire:model="tglLahir"
                    hint="Tanggal lahir" 
                />
            </div>

            <div
                class="col-span-2"
                :class="{
                    'md:col-span-4': liveSearch || selectedSearch == 'nik'
                }"
                wire:key
                x-init="$watch('searchTemp', value => {
                    if ($wire.isLiveSearch && value.length > 2) {
                        liveSearching = value
                    } else {
                        search = value
                    }
                })"
            >
                <x-input 
                    label="" 
                    x-ref="searchTemp"
                    wire:key="searchTemp"
                    x-model.debounce="searchTemp"
                    x-bind:placeholder="selectedSearch == 'nama' ? 'Masukkan nama lengkap' : 'Masukkan NIK'"
                    icon="o-identification" 
                    hint="Sesuai dengan KTP"
                >
                    <x-slot:append>
                        <x-button 
                            icon="o-x-mark" 
                            x-on:click="resetSearch" 
                            class="btn-primary btn-outline rounded-s-none" 
                        />
                    </x-slot:append>
                </x-input>
            </div>

            <div>
                <x-button 
                    label="Cari Data" 
                    icon="o-magnifying-glass" 
                    class="w-full btn-primary" 
                    wire:click="searchPasien"
                />
            </div>
        </div>
    </x-card>

    <x-card class="py-8 px-14" title="Hasil pencarian">
        <div 
            wire:loading 
            wire:target="searchPasien, liveSearching" 
            class="w-full"
        >
            <div class="flex items-center justify-center p-8 rounded-lg bg-slate-50 dark:bg-slate-500/10">
                <x-loading class="loading-dots" />
            </div>
        </div>

        <div 
            class="space-y-4" 
            wire:loading.remove 
            wire:target="searchPasien, liveSearching"
        >

            @if (empty($pasien) || $pasien->isEmpty())
                <div class="flex items-center justify-center p-8 rounded-lg bg-slate-50 dark:bg-slate-500/10">
                    <span class="text-lg">Data pasien tidak ada </span>
                    <x-button 
                        label="Tambahkan Pasien" 
                        icon="o-user-plus" 
                        class="btn-link" 
                        link="/pasien/create"
                    />
                </div>
            @else
                @foreach ($pasien as $data)
                    <div 
                        class="flex items-center justify-between p-4 rounded-lg bg-slate-50 dark:bg-slate-500/10"
                    >
                        <div class="flex items-center gap-4">
                            <h1 class="text-lg font-bold">{{ $data->nama }}</h1>
                            <x-badge 
                                value="No IHS | {{ $data->no_bpjs ?? 'Belum ada' }}" 
                                class=" bg-purple-500/10"
                            />
                            <span>{{ $data->nik }}</span>
                            <span>{{ $data->tgl_lahir }}</span>
                            <span>{{ $data->kelamin }}</span>
                        </div>
                        <x-button 
                            label="Pilih data" 
                            icon="o-cursor-arrow-ripple" 
                            class="btn-warning" 
                            link="/registrasi/kunjungan/pasien/{{ $data->id_pasien }}/create"
                        />
                    </div>
                @endforeach
            @endif
        
        </div>
    </x-card>
</div>
