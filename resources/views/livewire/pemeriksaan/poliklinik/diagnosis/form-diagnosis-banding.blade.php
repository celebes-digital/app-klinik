<div>
    <x-header 
        title="Diagnosis (ICD-10)"
        size="text-lg" 
        class="!mb-4 mt-8 bg-primary/5 py-2 px-4 rounded" 
    />
    <div>
        <x-textarea
            wire:model="form.keluhan_utama"
            placeholder="Tuliskan diagnosis banding"
            rows="5"
        />
    </div>
</div>
