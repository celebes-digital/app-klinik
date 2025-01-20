<div class="flex flex-col gap-4">
    <x-slot:headerActions>
        <div x-data>
            <x-button 
                icon="o-arrow-uturn-left" 
                label="Kembali"
                link="/pasien"
                wire:key
            />
            <x-button 
                icon="o-plus"
                label="Tambah Tenaga medis"
                class="btn-primary"
                link="/tenaga-medis/create"
                wire:key
            />
        </div>
    </x-slot:headerActions>
    <livewire:tenaga-medis.konfigurasi.profesi />
    <livewire:tenaga-medis.konfigurasi.spesialisasi />
</div>
