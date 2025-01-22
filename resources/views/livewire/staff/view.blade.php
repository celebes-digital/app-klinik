@php
    $staff = App\Models\Staff::paginate($this->perPage);
@endphp

<div>
    <x-header title="Staff" separator />

    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-12" title="Daftar Staff" shadow separator>
            <x-slot:menu>
                <x-post link="/staff/create" />
            </x-slot:menu>

            <x-table :headers="$headers" :rows="$staff" striped with-pagination per-page="perPage">
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
                @scope('actions', $staff)
                    <div class="flex gap-2">
                        <x-button 
                            icon="o-pencil-square" 
                            wire:click="$dispatch('set-staff', { id: {{ $staff->id_staff }}})" 
                            link="/staff/update/{{ $staff->id_staff }}"
                            spinner 
                            class="btn-sm" 
                        />
                        <x-button 
                            icon="o-trash" 
                            wire:click="delete({{ $staff->id_staff }})" 
                            spinner 
                            class="btn-sm" 
                        />
                    </div>
                @endscope
            </x-table>
        </x-card>
    </div>
</div>
