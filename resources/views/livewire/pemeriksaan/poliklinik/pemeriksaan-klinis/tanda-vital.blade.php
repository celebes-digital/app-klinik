<div>
    <x-header 
        title="Tanda Vital"
        size="text-xl" 
        class="!mb-4 bg-primary/5 py-2 px-4 rounded" 
    />
    <div class="grid grid-cols-3 gap-4">
        @foreach ($tandaVital as $key => $item)
            <x-input 
                label="{{$item['display']}}" 
                wire:model="formTandaVital.pemeriksaan_tanda_vital.{{$key}}" 
                suffix="{{$item['unit']}}" 
            />
        @endforeach
    </div>
    <div class="flex justify-end my-4">
        <x-button
            label="Simpan"
            class="btn-primary"
            wire:click="save"
        />
    </div>
</div>
