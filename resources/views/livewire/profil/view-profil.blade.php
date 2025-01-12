<div>
    <x-card separator progress-indicator>
        <x-tabs wire:model="selectedTab">
            {{-- Informasi Umum --}}
            <x-tab name="umum" label="Informasi Umum" icon="o-building-office-2">
                <livewire:profil.informasi-umum />
            </x-tab>

            {{-- Satu sehat --}}
            <x-tab name="satu-sehat" label="Satu Sehat" icon="o-link">
                <livewire:profil.satu-sehat :satuSehat="$satuSehat" />
            </x-tab>
        </x-tabs>
    </x-card>
</div>
