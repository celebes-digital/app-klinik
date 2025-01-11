<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button 
                icon="o-plus" 
                label="Tambah Poliklinik"
                @click="$dispatch('reset-form')" 
                class="btn-sm"
                wire:key
            />
        </div>
    </x-slot:headerActions>
    <div class="grid md:gap-8 md:grid-cols-6">
        <livewire:poli.poli-list />
        <livewire:poli.poli-store />
    </div>
</div>
