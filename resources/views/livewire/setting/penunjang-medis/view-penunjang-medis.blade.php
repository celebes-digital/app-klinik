<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button 
                icon="o-plus" 
                label="Tambah Penunjang"
                @click="$dispatch('reset-form')" 
                class="btn-primary"
                wire:key
            />
        </div>
    </x-slot:headerActions>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-5">
        <div class="lg:col-span-3">
            <livewire:setting.penunjang-medis.list-penunjang-medis />
        </div>
        <div class="lg:col-span-2">
            <livewire:setting.penunjang-medis.form-penunjang-medis />
        </div>
    </div>
</div>
