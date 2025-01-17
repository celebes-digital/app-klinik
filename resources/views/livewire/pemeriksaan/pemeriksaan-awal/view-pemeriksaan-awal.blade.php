<div>
    <x-card 
        title="Formulir Pemeriksaan | {{$kunjungan->pasien->nama}}" 
        subtitle="Tanggal Kunjungan: {{ \Carbon\Carbon::parse($kunjungan->tgl_kunjungan)->format('d F Y H:i') }}" 
        class="col-span-2" 
        separator
    >
        <x-slot:menu>
            <x-badge value="No. Kunjungan {{ $kunjungan->no_kunjungan }}" class="badge-primary badge-lg" />
        </x-slot:menu>

        <div class="grid grid-cols-2 gap-12">
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-1/4">Tanggal Lahir</div>
                    <div class="w-3/4">
                        <x-input 
                            class="w-full" 
                            value="{{ \Carbon\Carbon::parse($kunjungan->pasien->tgl_lahir)->format('d F Y') }}" readonly 
                        />
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-1/4">Jenis Kelamin</div>
                    <div class="w-3/4">
                        <x-input 
                            class="w-full" 
                            value="{{ $kunjungan->pasien->kelamin == 'male' ? 'Laki-laki' : 'Perempuan' }}" readonly 
                        />
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-1/4">Nama Poli</div>
                    <div class="w-3/4">
                        <x-input 
                            class="w-full" 
                            value="{{ $kunjungan->poliklinik->nama_poli }}" 
                            readonly 
                        />
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-1/4">Nama Dokter</div>
                    <div class="w-3/4">
                        <x-input 
                            class="w-full" 
                            value="{{ $kunjungan->tenaga_medis->nama }}" 
                            readonly 
                        />
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <x-card>
        <x-tabs
            wire:model="selectedTab"
            active-class="text-white rounded bg-primary"
            label-class="font-semibold"
            label-div-class="p-2 rounded bg-primary/5"
        >
            <x-tab name="anamnesis" label="Anamnesis">
                <div>Anamnesis</div>
            </x-tab>
            <x-tab name="klinis" label="Klinis">
                <div>Klinis</div>
            </x-tab>
            <x-tab name="diagnosa" label="Diagnosa">
                <div>Diagnosa</div>
            </x-tab>
            <x-tab name="riwayatDiagnosa" label="Riwayat Diagnosa">
                <div>Riwayat Diagnosa</div>
            </x-tab>
            <x-tab name="tindakanMedis" label="Tindakan Medis">
                <div>Tindakan Medis</div>
            </x-tab>
            <x-tab name="resumeMedis" label="Resume Medis">
                <div>Resume Medis</div>
            </x-tab>
        </x-tabs>
    </x-card>
</div>
