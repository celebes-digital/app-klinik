<div>
    <x-header 
        title="Data Satu Sehat" 
        subtitle="Data didapat dari satu sehat sebagai bagian dari fasyankes" 
        size="text-xl" 
    />
    <x-form wire:submit="save">
        <div class="grid gap-4 md:grid-cols-3">
            <x-input icon="o-arrow-down-on-square" label="Organization ID" wire:model="form.organization_id" />
            <x-input icon="o-arrow-down-on-square" label="Client ID" wire:model="form.client_id" />
            <x-input icon="o-arrow-down-on-square" label="Client Secret" wire:model="form.client_secret" />
        </div>

        <x-slot:actions>
            <x-button label="Simpan Data" class="btn-primary" wire:dirty.class='disabled' type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
