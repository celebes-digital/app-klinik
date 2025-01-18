<div>
    <x-header 
        title="Tanda Vital"
        size="text-xl" 
        class="!mb-4 bg-primary/5 py-2 px-4 rounded" 
    />
    <div class="grid grid-cols-3 gap-4">
        <x-input label="Denyut Jantung" wire:model="form.denyut_jantung" suffix="per menit" />
        <x-input label="Pernapasan" wire:model="form.denyut_jantung" suffix="per menit" />
        <x-input label="Suhu Tubuh" wire:model="form.denyut_jantung" suffix="Celcius" />
        <x-input label="Sistole" wire:model="form.denyut_jantung" suffix="mm[Hg]" />
        <x-input label="Diastole" wire:model="form.denyut_jantung" suffix="mm[Hg]" />
        <x-input label="Tinggi Badan" wire:model="form.denyut_jantung" suffix="cm" />
        <x-input label="Berat Badan" wire:model="form.denyut_jantung" suffix="kg" />
        <x-input label="Luas Permukaan Tubuh" hint="Untuk anak-anak" wire:model="form.denyut_jantung" suffix="m2" />
    </div>
</div>
