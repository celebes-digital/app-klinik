<div>
    <livewire:pemeriksaan.poliklinik.detail-pemeriksaan-poliklinik :$kunjungan lazy />
    <x-card>
        <x-tabs
            wire:model="selectedTab"
            active-class="text-white rounded bg-primary"
            label-class="font-semibold"
            label-div-class="p-2 mb-2 rounded bg-primary/5"
        >
            <x-tab name="anamnesis" label="Anamnesis">
                <livewire:pemeriksaan.poliklinik.anamnesis.create-anamnesis :$kunjungan />
            </x-tab>
            <x-tab name="klinis" label="Pemeriksaan Klinis">
                <x-header 
                    title="Pemeriksaan Klinis"
                    size="text-2xl" 
                    class="!mb-4" 
                    separator
                />
                <livewire:pemeriksaan.poliklinik.pemeriksaan-klinis.tanda-vital :$kunjungan />
                <livewire:pemeriksaan.poliklinik.pemeriksaan-klinis.pemeriksaan-fisik :$kunjungan />
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
