<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button 
                icon="o-plus" 
                label="Tambah Poliklinik"
                @click="$dispatch('reset-form')" 
                class="btn-primary"
                wire:key
            />
        </div>
    </x-slot:headerActions>
    
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-5">
        <div class="lg:col-span-3">
            <livewire:setting.poli.list-poli />
        </div>
        <div class="lg:col-span-2">
            <livewire:setting.poli.form-poli />
        </div>
    </div>
</div>
