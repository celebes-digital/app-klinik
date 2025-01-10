<div>
    <x-header title="Home" separator />

    {{-- <!-- HEADER -->
    <x-header title="Hello" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <!-- TABLE  -->
    <x-card>
        <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy">
            @scope('actions', $user)
            <x-button icon="o-trash" wire:click="delete({{ $user['id'] }})" spinner class="text-red-500 btn-ghost btn-sm" />
            @endscope
        </x-table>
    </x-card>

    <!-- FILTER DRAWER -->
    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer> --}}

    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        <x-stat
            title="Status Menunggu"
            value="22.124"
            class="text-orange-500 bg-orange-100"
            icon="o-arrow-trending-up" />

        <x-stat
            title="Status Diperiksa"
            value="22.124"
            class="text-blue-500 bg-blue-50"
            icon="o-arrow-trending-up" />

        <x-stat
            title="Kunjungan"
            description="Hari ini"
            value="22.124"
            icon="o-arrow-trending-up" />

        <x-stat
            title="Kunjungan"
            description="Bulan ini"
            value="34"
            icon="o-arrow-trending-down" />

        <x-stat
            title="Rawat Inap"
            description="Hari ini"
            value="22.124"
            icon="o-arrow-trending-up" />

        <x-stat
            title="Rawat Inap"
            description="Bulan ini"
            value="34"
            icon="o-arrow-trending-down" />

        <x-stat
            title="Rawat Jalan"
            description="Hari ini"
            value="22.124"
            icon="o-arrow-trending-up" />

        <x-stat
            title="Rawat Jalan"
            description="Bulan ini"
            value="34"
            icon="o-arrow-trending-down" />
    </div>
</div>
